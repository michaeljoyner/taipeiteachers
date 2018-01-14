<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolForm extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'           => 'required|max:255',
            'latitude'       => 'required|numeric|between:-80,80',
            'longitude'      => 'required|numeric|between:-180,180',
            'address'        => 'nullable|max:255',
            'telephone'      => 'nullable|max:255',
            'city'           => 'nullable|max:255',
            'email'          => 'email|nullable|max:255',
            'website'        => 'nullable|url|max:255',
            'photo_url'      => 'nullable|url|max:255',
            'contact_person' => 'nullable|max:255'
        ];
    }

    public function allowedFields()
    {
        return $this->only([
            'name',
            'latitude',
            'longitude',
            'address',
            'telephone',
            'city',
            'email',
            'website',
            'photo_url',
            'contact_person'
        ]);
    }
}
