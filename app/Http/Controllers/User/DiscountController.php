<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Admin\Discount\ApplyDiscountsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    private $applyDiscountsService;

    function __construct(ApplyDiscountsService $applyDiscountsService)
    {
        $this->applyDiscountsService = $applyDiscountsService;
    }

    public function store(Request $request)
    {
        $code = $request->input('code');

        $result = $this->applyDiscountsService->execute(Auth::user(), $code);

        return response($result['data'], $result['status']);
    }
}
