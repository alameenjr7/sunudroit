<?php

namespace App\Http\Controllers;

use App\Models\DocumentPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contrats = DocumentPdf::orderBy('id','DESC')->get();
        // dd($contrats->id);

        return view('backend.contrats.index',compact('contrats'));
    }


    public function contratStatus(Request $request){
        if($request->_this =='true'){
            DB::table('document_pdfs')->where('id', $request->id)->update(['status'=>'activer']);

            return response()->json(['msg'=> 'Contrat activer avec succes', 'status'=>true]);
        }
        else{
            DB::table('document_pdfs')->where('id', $request->id)->update(['status'=>'desactiver']);

            return response()->json(['msg'=> 'Contrat desactiver avec succes', 'status'=>true]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.contrats.create');
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
        $this->validate($request, [
            'title'=>'string|required',
            'contenu'=>'string|required',
            'prix'=>'nullable|numeric',
            'conditions'=>'nullable|in:gratuit,payant',
            'status'=>'nullable|in:activer,desactiver',
        ]);
        $data=$request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = DocumentPdf::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;

        $status = DocumentPdf::create($data);
        if($status){
            return redirect()->route('contrats.index')->with('success', 'Contrat creer avec succes');
        } else {
            return back()->while('error', 'Something went wrong!');
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
        $contrat = DocumentPdf::find($id);
        if($contrat){
            return view('backend.contrats.edit', compact('contrat'));
        }
        else{
            return back()->with('error', 'Data not found');
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
        $contrat = DocumentPdf::find($id);
        if($contrat){
            $this->validate($request, [
                'title'=>'string|required',
                'contenu'=>'string|required',
                'prix'=>'nullable|numeric',
                'conditions'=>'nullable|in:gratuit,payant',
                'status'=>'nullable|in:activer,desactiver',
            ]);
            $data=$request->all();

            $status=$contrat->fill($data)->save();
            if($status){
                return redirect()->route('contrats.index')->with('success', 'Contrat modifier avec succes');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
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
        $contrat = DocumentPdf::find($id);
        if($contrat){
            $status = $contrat->delete();
            if($status){
                return redirect()->route('contrats.index')->with('success', 'Contrat supprimer avec succes');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }
}
