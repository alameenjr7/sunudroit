<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings()
    {
        $setting=Setting::first();
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
            'logo'=>$request->logo,
            'email'=>$request->email,
            'telephone1'=>$request->telephone1,
            'telephone2'=>$request->telephone2,
            'adresse'=>$request->adresse,
            'footer'=>$request->footer,
            'fax'=>$request->fax,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url,
            'youtube_url'=>$request->youtube_url,
            'map_url' =>$request->map_url,
        ]);
        $status=$setting->fill($request->all());
        if($status){
            return back()->with('success','Setting successfully updated');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
}
