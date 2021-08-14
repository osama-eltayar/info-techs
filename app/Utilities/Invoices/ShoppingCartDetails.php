<?php


namespace App\Utilities\Invoices;

use Illuminate\Support\Collection;

class ShoppingCartDetails
{
    private int $total = 0;
    private int $subTotal = 0;
    private int $taxes = 0;
    private Collection $courses;

    public function __construct(Collection $courses)
    {
        $this->courses = $courses;

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
        $this->subTotal = $this->courses->sum('price');
    }

    private function calculateTotal()
    {
        $this->total = $this->subTotal + $this->taxes;
    }

}
