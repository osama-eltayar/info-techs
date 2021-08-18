<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = ShoppingCart::forUser(Auth::id())
                             ->with('transaction','course')
                             ->simplePaginate(5);

        return view('user.invoices.index',compact('invoices'));
    }

    public function print(Transaction $transaction)
    {

        $pdf = \PDF::loadView('user.invoices.partials.invoice-template', compact('transaction'));
        return $pdf->download('invoice.pdf');
    }
}
