<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'photo', 'description', 'status', 'is_parent', 'parent_id'];


    public static function shiftChild($cat_id)
    {
        return Categorie::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }

    public static function getChildByParentID($id)
    {
        return Categorie::where('parent_id',$id)->pluck('title','id');
    }

    public function publications()
    {
        return $this->hasMany('App\Models\Publication','cat_id','id')->where('status','active');
    }

    public function getCreatedAt()
    {
        setlocale(LC_TIME, "fr_FR");
        return strftime("%e %B %Y", strtotime($this->created_at));
    }

}
