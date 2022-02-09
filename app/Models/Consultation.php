<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'email', 'sujet', 'message', 'response'];

    public function getCreatedAt()
    {
        setlocale(LC_TIME, "fr_FR");
        return strftime("%e %B %Y", strtotime($this->created_at));
    }

    public function getUpdatedAt()
    {
        setlocale(LC_TIME, "fr_FR");
        return strftime("%e %B %Y", strtotime($this->updated_at));
    }
}
