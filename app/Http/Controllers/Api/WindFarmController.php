<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WindFarmResource;
use Illuminate\Http\Request;

class WindFarmController extends Controller
{
    public function __invoke(Request $request)
    {
        $windFarm = $request->user()->windFarms()->with([
            'turbines' => ['components', 'inspections' => ['inspectionComponents']]
        ])->first();

        return new WindFarmResource($windFarm);
    }
}
