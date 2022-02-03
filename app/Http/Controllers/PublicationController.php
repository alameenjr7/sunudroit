<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::orderBy('id', 'DESC')->get();
        return view('backend.publications.index', compact('publications'));
    }

    public function publicationStatus(Request $request){
        if($request->_this=='true'){
            DB::table('publications')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('publications')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=> 'Successfully updated publications', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'string|required',
            'subtitle' => 'string|required',
            'photo' => 'nullable',
            'contenu' => 'string|required',
            'status' => 'nullable|in:active,inactive'
        ]);

        $data = $request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Publication::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;

        $status = Publication::create($data);
        if($status){
            return redirect()->route('publication.index')->with('success','Publication creer avec succes');
        }
        else {
            return back()->withErrors('Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $publication = Publication::find($id);
        if($publication){
            return view('backend.publications.edit',compact('publication'));
        }
        else{
            return back()->withErrors('Publication not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $publication = Publication::find($id);
        if($publication){
            $this->validate($request,[
                'title' => 'string|required',
                'subtitle' => 'string|required',
                'photo' => 'nullable',
                'contenu' => 'string|required',
                'status' => 'nullable|in:active,inactive'
            ]);
            $data = $request->all();

            $status = $publication->fill($data)->save();
            if($status){
                return redirect()->route('publication.index')->with('success','Publication modifiee avec succes');
            }
            else {
                return back()->withErrors('Something went wrong');
            }
        }
        else{
            return back()->withErrors('Publication not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $publication = Publication::find($id);
        if($publication){
            $status = $publication->delete();
            if($status){
                return redirect()->route('publication.index')->with('success','Publication supprimer avec succes');
            }
            else {
                return back()->withErrors('Something went wrong');
            }
        }
        else {
            return back()->withErrors('Data not found');
        }

    }
}
