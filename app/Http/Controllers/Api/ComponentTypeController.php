<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComponentTypeResource;
use App\Models\ComponentType;

class ComponentTypeController extends Controller
{
    public function __invoke()
    {
        return ComponentTypeResource::collection(ComponentType::all());
    }
}
