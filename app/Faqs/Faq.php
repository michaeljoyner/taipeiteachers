<?php

namespace App\Faqs;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Sluggable;

    protected $fillable = ['question', 'short_answer', 'full_answer'];

    protected $casts = ['published' => 'boolean'];

    public function publish()
    {
        $this->published = true;
        $this->save();
    }

    public function retract()
    {
        $this->published = false;
        $this->save();
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function updateFullAnswer($answer)
    {
        $this->full_answer = $answer;
        $this->save();
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }
}
