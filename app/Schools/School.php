<?php

namespace App\Schools;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'city',
        'email',
        'website',
        'photo_url',
        'latitude',
        'longitude',
        'contact_person'
    ];

    public function toJsonableArray()
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'address'        => $this->address,
            'telephone'      => $this->telephone,
            'city'           => $this->city,
            'email'          => $this->email,
            'website'        => $this->website,
            'photo_url'      => $this->photo_url,
            'latitude'       => $this->latitude,
            'longitude'      => $this->longitude,
            'latLng'         => ['lat' => $this->latitude, 'lng' => $this->longitude],
            'contact_person' => $this->contact_person
        ];
    }
}
