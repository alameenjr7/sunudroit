<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\EquipePro;
use App\Models\MailingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailing;
use App\Models\Categorie;
use App\Models\Consultation;
use App\Models\Message;
use App\Models\Publication;
use App\Models\PublicationReview;

class IndexController extends Controller
{
    public function home()
    {
        $banners = Banner::where('status','active')
        ->orderBy('id','desc')
        ->limit(5)
        ->get();

        $categories = Categorie::where(['status'=>'active','is_parent'=>1])
        ->orderBy('id','desc')
        ->limit(4)
        ->get();

        $equipePro = EquipePro::where('status','active')
        ->orderBy('id','desc')
        ->limit(4)
        ->get();

        $consultations = Consultation::where('response', '<>', '', 'and')
        ->orderBy('id','DESC')
        ->limit(3)
        ->get();

        return view('frontend.index',compact('banners','categories','equipePro','consultations'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function service()
    {
        $categories=Categorie::where('status','active')
        ->orderBy('id','desc')
        ->get();

        return view('frontend.pages.services',compact('categories'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'full_name' => 'string|required',
            'email' => 'string|required',
            'telephone' => 'string|required',
            'message' => 'string|required',
        ]);

        $data = $request->all();
        
        $status = Message::create($data);

        if($status){
            // Mail::to('babangom673@gmail.com')->send(new Contact($data));

            return back()->with('success','Message envoyer avec succes');
        }
        else {
            return back()->with('error','Quelque chose s\'est mal passé!');
        }
    }

    // consultation
    public function consultationSubmit(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'string|required',
            'email' => 'string|required',
            'sujet' => 'string|required',
            'message' => 'string|required|max:1000',
        ]);

        $data = $request->all();

        $status = Consultation::create($data);

        if($status){
            // Mail::to('babangom673@gmail.com')->send(new Contact($data));

            return back()->with('success','Consultation envoyer avec succes');
        }
        else {
            return back()->with('error','Quelque chose s\'est mal passé!');
        }
    }

    public function corporate()
    {
        return view('frontend.pages.corporate');
    }

    public function autoSearch(Request $request)
    {
        $query = $request->get('term','');
        $publications = Publication::where('title','LIKE','%'.$query.'%')->get();

        $data = array();
        foreach($publications as $publication)
        {
            $data[] = array('value'=>$publication->title,'id'=>$publication->id);
        }
        if(count($data))
        {
            return $data;
        }
        else
        {
            return ['value'=> 'No Result Found','id'=>''];
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $publication = Publication::where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(5);
        $categories = Categorie::where(['status'=>'active','is_parent'=>1])->with('publications')->orderBy('title','ASC')->get();
        $lastPublication = Publication::where('status','active')->orderBy('id','DESC')->limit(3)->get();
       
        return view('frontend.pages.publication',compact('publication','categories','lastPublication'));
    }

    public function publicationDetail($slug)
    {
        $publication = Publication::with('rel_pubs')->where('slug',$slug)->first();
        $lastPublication = Publication::where('status','active')
        ->orderBy('id','DESC')
        ->limit(3)
        ->get();

        if($publication) {
            return view('frontend.pages.publication-detail',compact(['publication','lastPublication']));
        }
        else {
            return view('errors.404');
        }
    }

    public function categorieDetail($slug)
    {
        $cat_details = Categorie::where('slug',$slug)->first();
        

        if($cat_details) {
            return view('frontend.pages.cat-details',compact(['cat_details']));
        }
        else {
            return view('errors.404');
        }
    }

    public function publicationDetail1($id)
    {
        $publication = Publication::find($id);
        return $publication;

        if($publication) {
            return view('frontend.pages.publication-detail',compact('publication','count_review'));
        }
        else {
            return view('errors.404');
        }
    }

    // Publication Categorie
    public function publicationCategorie(Request $request,$slug)
    {
        $categories = Categorie::with(['publications'])->where('slug',$slug)->first();

        $sort='';

        if($request->sort != null){
            $sort=$request->sort;
        }
        if($categories == null){
            return view('errors.404');
        }
        else{
            if($sort=='title'){
                $publications=Publication::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(12);
            }
            elseif($sort=='subtitle'){

                $publications=Publication::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(12);
            }
            elseif($sort=='contenu'){

                $publications=Publication::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('contenu','ASC')->paginate(12);
            }
            else{
                $publications=Publication::where(['status'=>'active','cat_id'=>$categories->id])->paginate(12);
            }
        }

        $route='publication-categorie';

        $lastPublication = Publication::where('status','active')
        ->orderBy('id','DESC')
        ->limit(3)
        ->get();

        if($request->ajax()){
            $view=view('frontend.layouts._single-publication',compact('publications'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('frontend.pages.publication-categorie', compact(['categories','route','lastPublication','publications']));
    }

    //Review
    public function publicationReview(Request $request)
    {
        $this->validate($request,[
            'rate' => 'required|numeric',
            'full_name' => 'required|string',
            'email' => 'required|string',
            'review' => 'nullable|string',
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

    //Publication
    public function publication(Request $request)
    {
        $publication = Publication::query();

        //Categorie filter
        if(!empty($_GET['Categorie']))
        {
            $slug=explode(',',$_GET['Categorie']);
            $cat_ids=Categorie::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $publication=$publication->whereIn('cat_id',$cat_ids);
        }
        else
        {
            $publication=$publication->where('status','active')->orderBy('id','DESC')->paginate(5);
        }

        // $publication = Publication::where('status','active')
        // ->orderBy('id','DESC')
        // ->limit(4)
        // ->get();

        $lastPublication = Publication::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $categories = Categorie::where(['status'=>'active','is_parent'=>1])->with('publications')->orderBy('title','ASC')->get();
        return view('frontend.pages.publication',compact('publication','categories','lastPublication'));
    }

    //shop filters
    public function publicationFilter(Request $request)
    {
        $data = $request->all();

        //Categorie filter
        $catUrl='';
        if(!empty($data['Categorie']))
        {
            foreach($data['Categorie'] as $Categorie){
                if(empty($catUrl)){
                    $catUrl .='&Categorie='.$Categorie;
                }
                else{
                    $catUrl .=','.$Categorie;
                }
            }
        }

        // dd($price_range_Url);
        return \redirect()->route('publication',$catUrl);
    }

    public function mailingListSubmit(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required|unique:mailing_lists,email',
        ]);

        $data = $request->all();

        $status = MailingList::create($data);

        if($status){
            Mail::to('babangom673@gmail.com')->send(new Mailing($data));

            return back()->with('success','Email ajoute avec succes dans notre liste e-mail');
        }
    }
}
