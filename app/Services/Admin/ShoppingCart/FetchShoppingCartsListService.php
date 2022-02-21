<?php

namespace App\Services\Admin\ShoppingCart;

use App\Models\ShoppingCart;
use App\Models\Transaction;

class FetchShoppingCartsListService
{
    public function execute($filterData, $perPage = null)
    {
        return ShoppingCart::query()
            ->with('transaction','user','course')
            ->filter($filterData)
            ->when(!$perPage, function ($q) {
                return $q->get();
            })
            ->when($perPage, function ($q) use ($perPage) {
                return $q->paginate($perPage);
            });
    }
}
