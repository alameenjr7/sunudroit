<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MesDroitsController extends Controller
{
    //
    public function calcul()
    {
        return view('frontend.pages.mesDroits.calcul-droit');
    }

    public function document()
    {
        return view('frontend.pages.mesDroits.document');
    }
}
