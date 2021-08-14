<?php


namespace App\Services\User;


use App\Models\ShoppingCart;
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

    private function getDetails()
    {
        return new ShoppingCartDetails($this->items->pluck('course'));
    }

    private function getItems()
    {
        return ShoppingCart::with('course')
                           ->forUser(auth()->id())
                           ->get();
    }
}
