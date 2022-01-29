<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipePro extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'email','adresse','telephone','poste','description','photo', 'status'];
}
