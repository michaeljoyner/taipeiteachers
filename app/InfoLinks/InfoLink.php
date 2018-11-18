<?php

namespace App\InfoLinks;

use Illuminate\Database\Eloquent\Model;

class InfoLink extends Model
{
    protected $table = 'info_links';

    protected $fillable = [
        'title',
        'content',
        'link',
        'link_text',
        'topic'
    ];
}
