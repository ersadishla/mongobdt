<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Anime extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'animeCollect';
    
    protected $fillable = [
        'anime_id',
        'name',
        'genre',
        'type',
        'episodes',
        'rating',
        'members',
    ];
}
