<?php


namespace App\Utilities\Invoices;

use Illuminate\Support\Collection;

class ShoppingCartDetails
{
    private int $total = 0;
    private int $subTotal = 0;
    private int $taxes = 0;
    private Collection $items;

    public function __construct(Collection $items)
    {
        $this->items = $items;

        $this->calculateSubTotal();
        $this->calculateTotal();
    }

    function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return NULL;
    }

    private function calculateSubTotal()
    {
        $this->subTotal = $this->items->sum('price');
    }

    private function calculateTotal()
    {
        $this->total = $this->subTotal + $this->taxes;
    }

}
