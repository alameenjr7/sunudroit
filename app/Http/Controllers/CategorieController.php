<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::orderBy('id', 'DESC')->get();
        return view('backend.categories.index', compact('categories'));
    }

    public function categorieStatus(Request $request){
        if($request->_this=='true'){
            DB::table('categories')->where('id', $request->id)->update(['status'=>'active']);

            return response()->json(['msg'=> 'Categorie active avec succes', 'status'=>true]);

        }
        else{
            DB::table('categories')->where('id', $request->id)->update(['status'=>'inactive']);
            
            return response()->json(['msg'=> 'Categorie desactive avec succes', 'status'=>true]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cats = Categorie::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.categories.create',compact('parent_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title'=>'string|required',
            'description'=>'string|nullable',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
            // 'photo'=>'required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();

        $slug = Str::slug($request->input('title'));
        $slug_count = Categorie::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;
        $data['is_parent'] = $request->input('is_parent',0);

        $status = Categorie::create($data);
        if($status){
            return redirect()->route('categorie.index')->with('success', 'Successfully created Categorie');
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
        $categorie=Categorie::find($id);
        $parent_cats = Categorie::where('is_parent',1)->orderBy('title','ASC')->get();
        if($categorie){
            return view('backend.categories.edit', compact(['categorie','parent_cats']));
        }
        else{
            return back()->with('error', 'Categorie not found');
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
        $categorie = Categorie::find($id);
        if($categorie){
            $this->validate($request, [
                'title'=>'string|required',
                'description'=>'string|nullable',
                'is_parent'=>'sometimes|in:1',
                'parent_id'=>'nullable|exists:categories,id',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data=$request->all();

            if($request->is_parent == 1)
            {
                $data['parent_id'] = null;
            }

            $data['is_parent'] = $request->input('is_parent',0);

            $status=$categorie->fill($data)->save();
            if($status){
                return redirect()->route('categorie.index')->with('success', 'Successfully updated Categorie');
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
        $categorie=Categorie::find($id);
        $child_cat_id = Categorie::where('parent_id',$id)->pluck('id');
        if($categorie){
            $status = $categorie->delete();
            if($status){
                if(count($child_cat_id)>0){
                    Categorie::shiftChild($child_cat_id);
                }
                return redirect()->route('categorie.index')->with('success', 'Categorie successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }

    public function getChildByParentID(Request $request,$id)
    {
        $categorie=Categorie::find($request->id);
        if($categorie){
            $child_id = Categorie::getChildByParentID($request->id);
            if(count($child_id)<=0){
                return response()->json(['status'=>false, 'data'=>null, 'msg'=>'non']);
            }
            return response()->json(['status'=>true, 'data'=>$child_id, 'msg'=>'yes']);
        }
        else{
            return response()->json(['status'=>false, 'data'=>null, 'msg'=>'Categorie not found']);
        }
    }
}
