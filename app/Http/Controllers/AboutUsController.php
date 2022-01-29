<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\BrandCompany;
use App\Models\EquipePro;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about()
    {
        $abouts=AboutUs::first();
        
        $brandCompany=BrandCompany::where('status','active')
        ->orderBy('id','desc')
        ->get();

        $equipePro=EquipePro::where('status','active')
        ->orderBy('id','desc')
        ->limit(4)
        ->get();

        return view('frontend.pages.about',compact('abouts','brandCompany','equipePro'));
    }


    public function aboutUpdate(Request $request)
    {
        $about=AboutUs::first();
        $status=$about->update([
            'heading'=>$request->heading,
            'content'=>$request->input('content'),
            'exp_years'=>$request->exp_years,
            'partner_affaire'=>$request->partner_affaire,
            'cas_done'=>$request->cas_done,
            'client_happy'=>$request->client_happy,
            'award_win'=>$request->award_win,
            'image'=>$request->image,
        ]);

        if($status){
            return redirect()->back()->with('success', 'Successfully updated AboutUs');
        } else {
            return back()->while('error', 'Something went wrong!');
        }
    }
}
