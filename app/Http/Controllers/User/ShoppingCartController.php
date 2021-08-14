<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ShoppingCartRequest;
use App\Models\ShoppingCart;
use App\Services\User\ShoppingCartService;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index(ShoppingCartService $shoppingCartService)
    {
        $shoppingCartData = $shoppingCartService->execute();

        return view('user.shopping-cart.index', $shoppingCartData);
    }

    public function store(ShoppingCartRequest $request)
    {
        ShoppingCart::firstOrCreate($request->only('course_id') + ['user_id' => auth()->id()]);

        return response([], 204);

    }

    public function destroy(ShoppingCart $shoppingCart)
    {
        $shoppingCart->delete() ;
        return response([],204);
    }
}
