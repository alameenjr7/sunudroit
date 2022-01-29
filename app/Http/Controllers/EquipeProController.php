<?php

namespace App\Http\Controllers;

use App\Models\EquipePro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipeProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipePros = EquipePro::orderBy('id', 'DESC')->get();
        return view('backend.equipe.index', compact('equipePros'));
    }

    public function equipeProStatus(Request $request){
        if($request->mode=='true'){
            DB::table('equipe_pros')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('equipe_pros')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=> 'Successfully updated status', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.equipe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'=>'string|required',
            'prenom'=>'string|required',
            'email'=>'string|required',
            'adresse'=>'string|nullable',
            'telephone'=>'string|nullable',
            'poste'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data=$request->all();

        $status=EquipePro::create($data);
        if($status){
            return redirect()->route('equipe.index')->with('success', 'Successfully created Equipe Pro');
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
        $equipePro=EquipePro::find($id);
        if($equipePro){
            return view('backend.equipe.edit', compact('equipePro'));
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
        $equipePro=EquipePro::find($id);
        if($equipePro){
            $this->validate($request, [
                'nom'=>'string|required',
                'prenom'=>'string|required',
                'email'=>'string|required',
                'adresse'=>'string|nullable',
                'telephone'=>'string|nullable',
                'poste'=>'string|required',
                'description'=>'string|nullable',
                'photo'=>'required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data=$request->all();

            $status=$equipePro->fill($data)->save();
            if($status){
                return redirect()->route('equipe.index')->with('success', 'Successfully updated Equipe Pro');
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
        $equipePro=EquipePro::find($id);
        if($equipePro){
            $status = $equipePro->delete();
            if($status){
                return redirect()->route('equipe.index')->with('success', 'Equipe Pro successfully deleted');
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
