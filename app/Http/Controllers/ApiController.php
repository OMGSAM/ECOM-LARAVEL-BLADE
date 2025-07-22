<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeoNamesService;

class ApiController extends Controller
{
    private $geoNamesService;

    public function __construct(GeoNamesService $geoNamesService)
    {
        $this->geoNamesService = $geoNamesService;
    }

    public function getCarts()
    {
        // Your implementation to get carts goes here
    }

    public function getProvinces()
    {
        $provinces = $this->geoNamesService->getProvinces();
        return response()->json([
            'provinces' => $provinces
        ]);
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->query('provinceId');
        $cities = $this->geoNamesService->getCities($provinceId);
        return response()->json([
            'cities' => $cities
        ]);
    }

    public function getShippingCost(Request $request)
    {
        $cityId = $request->query('city');
        $shippingCost = $this->geoNamesService->getShippingCost($cityId);
        return response()->json([
            'shipping_cost' => $shippingCost
        ]);
    }

    public function setShipping(Request $request)
    {
        // Your implementation to set the shipping cost goes here
    }

    public function checkout(Request $request)
    {
        // Your implementation for the checkout process goes here
    }
}
