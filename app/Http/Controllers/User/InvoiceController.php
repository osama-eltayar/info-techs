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
                             ->whereNotNull('paid_at')
                             ->simplePaginate(5);

        return view('user.invoices.index',compact('invoices'));
    }

    public function print($course)
    {
        $shoppingCart = ShoppingCart::query()
                                    ->forUser(Auth::id())
                                    ->where('course_id', $course)
                                    ->whereNotNull('paid_at')
                                    ->first();

        $pdf = \PDF::loadView('user.invoices.partials.invoice-template', compact('shoppingCart'));
        return $pdf->download('invoice.pdf');
    }
}
