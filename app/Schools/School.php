<?php

namespace App\Schools;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

class School extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    const MAIN_IMG = 'model_image';

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
            'contact_person' => $this->contact_person,
            'main_image' => [
                'thumb' => $this->imageUrl('thumb'),
                'original' => $this->imageUrl()
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->fit(Manipulations::FIT_CROP, 200, 200)
             ->keepOriginalImageFormat()
             ->optimize()
             ->performOnCollections(static::MAIN_IMG);
    }

    public function addImage($image_file)
    {
        $this->clearImage();
        return $this->addMedia($image_file)->preservingOriginal()->toMediaCollection(static::MAIN_IMG);
    }

    public function clearImage()
    {
        $this->clearMediaCollection(static::MAIN_IMG);
    }

    public function imageUrl($conversion = '')
    {
        $image = $this->getFirstMedia(static::MAIN_IMG);
        return $image ? $image->getUrl($conversion) : '';
    }
}
