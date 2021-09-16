<?php


namespace App\Services\User;


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
        return new ShoppingCartDetails($this->items->pluck('course'));
    }

    private function getItems()
    {
        return ShoppingCart::with('course')
                           ->whereNull('paid_at')
                           ->forUser(auth()->id())
                           ->get();
    }
}
