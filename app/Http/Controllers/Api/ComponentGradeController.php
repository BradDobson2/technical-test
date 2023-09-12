<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComponentGradeResource;
use App\Models\ComponentGrade;

class ComponentGradeController extends Controller
{
    public function __invoke()
    {
        return ComponentGradeResource::collection(ComponentGrade::all());
    }
}
