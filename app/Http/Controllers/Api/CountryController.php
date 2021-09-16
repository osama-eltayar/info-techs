<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index( Request $request )
    {
        $filterData['name'] = $request->q;
        $countries  = Country::query()
                             ->filter($filterData)
                             ->orderBy('name')
                             ->limit(20)
                             ->get();
        return CountryResource::collection($countries);
    }


}
