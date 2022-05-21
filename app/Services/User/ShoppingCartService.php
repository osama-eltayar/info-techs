<?php


namespace App\Services\User;

use App\Models\DiscountUser;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Utilities\Invoices\ShoppingCartDetails;
use Illuminate\Database\Eloquent\Collection;

class ShoppingCartService
{
    private Collection $items;

    /**
     * @return array
     */
    public function execute()
    {
        $this->items   = $this->getItems();

        return [
            'items'   => $this->items,
            'details' => $this->getDetails(),
        ];
    }

    public function pending($transactionId,$amount)
    {
        $transaction = Transaction::create([
                                               'number'  => $transactionId,
                                               'user_id' => auth()->id(),
                                               'type'    => Transaction::PENDING,
                                               'total'  => $amount
                                           ]);
        ShoppingCart::whereNull('paid_at')
                    ->forUser(auth()->id())
                    ->update(['transaction_id' => $transaction->id]);

        $this->fillPrices($transaction->id);
    }

    public function complete($originalTransactionId,$transactionId)
    {
        $transaction = Transaction::query()->where('number',$originalTransactionId)->first();
        $transaction->update(['number' => $transactionId,'type' => Transaction::DONE]);
        $transaction->shoppingCarts()->update(['paid_at' => now()]);

        return $transaction->shoppingCarts()
                           ->pluck('course_id');
    }

    private function getDetails()
    {
        return new ShoppingCartDetails($this->items);
    }

    private function getItems()
    {
        $soppingCartItems = ShoppingCart::with('course.activeDiscount')
                                        ->whereNull('paid_at')
                                        ->forUser(auth()->id())
                                        ->get();

        $soppingCartItems->map(function ($item){
            $discountUser = DiscountUser::where('shopping_cart_id', $item->id)->whereDate('end_date', '>=', now())->first();
            $discount = 0;

            if ($discountUser)
            {
                $discount = $discountUser->amount;
            }

            $item->price = optional($item->course->activeDiscount)->price ?? $item->course->price - $discount;
        });
        return $soppingCartItems ;
    }

    private function fillPrices($transactionId)
    {
        $items = ShoppingCart::with('course.activeDiscount')
                    ->where('transaction_id' , $transactionId)
                    ->get();

        $items->each(function ($item){
            $discountUser = DiscountUser::where('shopping_cart_id', $item->id)->whereDate('end_date', '>=', now())->first();
            $discount = 0;

            if ($discountUser)
            {
                $discount = $discountUser->amount;
            }

            $item->price = optional($item->course->activeDiscount)->price ?? $item->course->price - $discount;
            $item->update();
        });
    }
}
