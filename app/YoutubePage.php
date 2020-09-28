<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubePage extends Model
{
    protected $table = 'content_youtube_video';

    protected $fillable = [
    'title',
    'url',
    'youtube_link',
    ];

    static function embedYoutubeLink($link) {
        // $test = 'https://www.youtube.com/watch?v=3nfadIylKwc&feature=youtu.be&t=1';
        $params = explode('?', $link);
        parse_str($params[1], $params);
        $html = '<iframe width="750" height="422" src="https://www.youtube.com/embed/' . $params['v'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        return $html;
    }
}
