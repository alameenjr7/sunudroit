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
        'logo2',
        'favicon',
        'favicon2',
        'email_1',
        'email_2',
        'telephone1',
        'telephone2',
        'fax',
        'adresse',
        'lot',
        'appartement',
        'footer',
        'image_footer',
        'backgound_footer',
        'background_header',
        'text_abonnement',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
		'map_url',
    ];
}
