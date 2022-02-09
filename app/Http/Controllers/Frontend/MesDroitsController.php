<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MesDroitsController extends Controller
{
    //
    public function index(Request $request)
    {
        $full_name = $request->input('full_name');
        $types = $request->input('types');
        $salaire = $request->input('salaire');
        $result = 0;

        if($types == 'DT'){
            $result = $salaire * 1;
        }
        elseif($types == 'DF')
        {
            $result = $salaire * 2;
        }
        elseif($types == 'BC')
        {
            $result = $salaire * 3;
        }
        else{
            $result = 0;
        }

        return redirect()->back()->with('message', 'Bonjour '.$full_name.', votre base salariale est: '.$result.' FCFA');

    }

    public function calcul()
    {
        return view('frontend.pages.mesDroits.calcul-droit');
    }

    public function document()
    {
        return view('frontend.pages.mesDroits.document');
    }
}
