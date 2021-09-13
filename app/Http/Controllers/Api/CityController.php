<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index( Request $request )
    {
        $filterData = $request->only('country');
        $filterData['name'] = $request->q;
        $cities     = City::query()
                          ->filter($filterData)
                          ->limit(20)
                          ->get();
        return CityResource::collection($cities);
    }


}
