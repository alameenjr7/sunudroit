<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'meta_description',
        'meta_keywords',
        'logo',
        'favicon',
        'email',
        'telephone1',
        'telephone2',
        'fax',
        'adresse',
        'lot',
        'appartement',
        'footer',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
		'map_url',
    ];
}
