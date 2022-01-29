<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BrandCompany;
use App\Models\EquipePro;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $banners=Banner::where('status','active')
        ->orderBy('id','desc')
        ->limit(5)
        ->get();

        $brandCompany=BrandCompany::where('status','active')
        ->orderBy('id','desc')
        ->get();

        $equipePro=EquipePro::where('status','active')
        ->orderBy('id','desc')
        ->limit(4)
        ->get();

        return view('frontend.index',compact('banners','brandCompany','equipePro'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function service()
    {
        $brandCompany=BrandCompany::where('status','active')
        ->orderBy('id','desc')
        ->get();

        return view('frontend.pages.services',compact('brandCompany'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function blog()
    {
        $brandCompany=BrandCompany::where('status','active')
        ->orderBy('id','desc')
        ->get();

        return view('frontend.pages.blog',compact('brandCompany'));
    }

    public function corporate()
    {
        return view('frontend.pages.corporate');
    }
}
