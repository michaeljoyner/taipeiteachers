<?php

namespace App\Http\Controllers\Admin;

use App\Schools\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolImageController extends Controller
{
    public function store(School $school)
    {
        request()->validate([
            'image' => ['required', 'image']
        ]);
        $image = $school->addImage(request('image'));

        return ['image_src' => $image->getUrl('thumb')];
    }

    public function delete(School $school)
    {
        $school->clearImage();
    }
}
