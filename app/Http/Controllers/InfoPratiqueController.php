<?php

namespace App\Http\Controllers;


use App\Models\InfoPratique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InfoPratiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $infos = InfoPratique::orderBy('id','DESC')->get();
        return view('backend.infoPratique.index',compact('infos'));
    }


    public function infoPratiqueStatus(Request $request){
        if($request->_this =='true'){
            DB::table('info_pratiques')->where('id', $request->id)->update(['status'=>'active']);

            return response()->json(['msg'=> 'Info Pratique active avec succes', 'status'=>true]);
        }
        else{
            DB::table('info_pratiques')->where('id', $request->id)->update(['status'=>'inactive']);

            return response()->json(['msg'=> 'Info Pratique desactive avec succes', 'status'=>true]);
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
        return view('backend.infoPratique.create');
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
            'description'=>'string|required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data=$request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = InfoPratique::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;

        $status = InfoPratique::create($data);
        if($status){
            return redirect()->route('info_pratique.index')->with('success', 'Successfully created info');
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
        $infos = InfoPratique::find($id);
        if($infos){
            return view('backend.infoPratique.edit', compact('infos'));
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
        $infos = InfoPratique::find($id);
        if($infos){
            $this->validate($request, [
                'title'=>'string|required',
                'description'=>'string|required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data = $request->all();

            $status = $infos->fill($data)->save();
            if($status){
                return redirect()->route('info_pratique.index')->with('success', 'Successfully updated infos');
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
        $infos = InfoPratique::find($id);
        if($infos){
            $status = $infos->delete();
            if($status){
                return redirect()->route('info_pratique.index')->with('success', 'Infos successfully deleted');
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
