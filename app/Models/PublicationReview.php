<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationReview extends Model
{
    use HasFactory;

    protected $fillable = ['rate', 'full_name', 'publication_id', 'email', 'review','status'];

    public function getCreatedAt()
    {
        setlocale(LC_TIME, "fr_FR");
        return strftime("%e %B %Y", strtotime($this->created_at));
    }
}
