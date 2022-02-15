<?php

namespace App\Http\Controllers;

use App\Models\PublicationReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationReviewController extends Controller
{
    //
    public function index()
    {
        $pubReviews = PublicationReview::orderBy('id','DESC')->get();
        return view('backend.pub-reviews.index',compact('pubReviews'));
    }

    public function pubReviewStatus(Request $request){
        if($request->_this =='true'){
            DB::table('publication_reviews')->where('id', $request->id)->update(['status'=>'active']);
            
            return response()->json(['msg'=> 'Commentaire activer avec succes', 'status'=>true]);
        }
        else{
            DB::table('publication_reviews')->where('id', $request->id)->update(['status'=>'inactive']);
            
            return response()->json(['msg'=> 'Commentaire desactiver avec succes', 'status'=>true]);
        }
    }

    
    //Review
    public function publicationReview(Request $request)
    {
        $this->validate($request,[
            'rate' => 'required|numeric',
            'full_name' => 'required|string',
            'email' => 'required|string',
            'review' => 'nullable|string',
            'status' => 'nullable|in:active,inactive'
        ]);

        $data = $request->all();

        $status = PublicationReview::create($data);
        if($status){
            return back()->with('success','Merci pour votre feedback');
        }
        else{
            return back()->with('error','SVP! Essayer encore');
        }
    }
}
