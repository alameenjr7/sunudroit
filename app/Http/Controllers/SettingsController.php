<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class SettingsController extends Controller
{
    public function settings()
    {
        $setting = Setting::first();
        return view('backend.settings.settings',compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $setting=Setting::first();
        $status=$setting->update([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'favicon'=>$request->favicon,
            'favicon2'=>$request->favicon2,
            'logo'=>$request->logo,
            'logo2'=>$request->logo2,
            'email_1'=>$request->email_1,
            'email_2'=>$request->email_2,
            'telephone1'=>$request->telephone1,
            'telephone2'=>$request->telephone2,
            'adresse'=>$request->adresse,
            'lot'=>$request->lot,
            'appartement'=>$request->appartement,
            'footer'=>$request->footer,
            'text_abonnement'=>$request->text_abonnement,
            'image_footer'=>$request->image_footer,
            'background_footer'=>$request->background_footer,
            'background_header'=>$request->background_header,
            'fax'=>$request->fax,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url,
            'youtube_url'=>$request->youtube_url,
            'map_url' =>$request->map_url,
        ]);
        
        Url($request->map_url);
        $status=$setting->fill($request->all());
        if($status){
            return back()->with('success','Les paramettres ont ete modifie avec succes');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
}
