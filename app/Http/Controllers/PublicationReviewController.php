<?php

namespace App\Http\Controllers;

use App\Models\PublicationReview;
use Illuminate\Http\Request;

class PublicationReviewController extends Controller
{
    //
    public function index()
    {
        $pubReviews = PublicationReview::orderBy('id','DESC')->get();
        return view('backend.pub-reviews.index',compact('pubReviews'));
    }
}
