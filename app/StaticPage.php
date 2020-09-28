<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $table = 'content_static_page';

    protected $fillable = [
    'title',
    'url',
    'content',
    'published',
    ];
}
