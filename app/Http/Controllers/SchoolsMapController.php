<?php

namespace App\Http\Controllers;

use App\Schools\School;
use Illuminate\Http\Request;

class SchoolsMapController extends Controller
{
    public function show()
    {
        $schools = School::all()->map->toJsonableArray();

        return view('front.schools.map', ['schools' => $schools]);
    }
}
