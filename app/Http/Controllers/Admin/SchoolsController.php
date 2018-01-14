<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SchoolForm;
use App\Schools\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolsController extends Controller
{

    public function index()
    {
        $schools = School::all();

        return view('admin.schools.index', ['schools' => $schools]);
    }

    public function show(School $school)
    {
        return view('admin.schools.show', ['school' => $school->toJsonableArray()]);
    }

    public function store(SchoolForm $form)
    {
        School::create($form->allowedFields());
    }

    public function update(School $school, SchoolForm $form)
    {
        $school->update($form->allowedFields());

        return $school->fresh()->toJsonableArray();
    }

    public function delete(School $school)
    {
        $school->delete();
    }
}
