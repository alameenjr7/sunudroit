<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DocumentPdf extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'contenu', 'prix', 'conditions', 'status'];

    public function limit()
    {
        return Str::limit($this->contenu, 35, $end= ' ...');
    }

    public function htmlDecode()
    {
        return htmlspecialchars_decode(nl2br(e($this->limit())));
    }

    

    public function getCreatedAt()
    {
        setlocale(LC_TIME, "fr_FR");
        return strftime("%e %B %Y", strtotime($this->created_at));
    }
}
