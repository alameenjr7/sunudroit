<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable=['heading','content','image','exp_years','partner_affaire','cas_done','client_happy','award_win'];

}
