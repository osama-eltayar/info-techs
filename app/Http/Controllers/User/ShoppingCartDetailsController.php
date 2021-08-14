<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Utilities\Invoices\ShoppingCartDetails;
use Illuminate\Http\Request;

class ShoppingCartDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $details = new ShoppingCartDetails(auth()->user()->shoppingCart);
        return view('user.shopping-cart.partials.details', compact('details'));
    }
}
