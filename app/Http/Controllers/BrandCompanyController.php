<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BrandCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandCompanies = BrandCompany::orderBy('id', 'DESC')->get();
        return view('backend.brand.index', compact('brandCompanies'));
    }

    public function brandStatus(Request $request){
        if($request->mode=='true'){
            DB::table('brand_companies')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('brand_companies')->where('id', $request->id)->update(['status'=>'inactive']);
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
        return view('backend.brand.create');
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
            'title'=>'nullable|string',
            'photo'=>'required',
            'status'=>'nullable|in:active,inactive',
        ]);
        $data=$request->all();

        $slug=Str::slug($request->input('title'));
        $slug_count=BrandCompany::where('slug', $slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;

        $status=BrandCompany::create($data);
        if($status){
            return redirect()->route('brand.index')->with('success', 'brand Company successfully created');
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
        $brandCompany=BrandCompany::find($id);
        if($brandCompany){
            return view('backend.brand.edit', compact('brandCompany'));
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
        $brandCompany=BrandCompany::find($id);
        if($brandCompany){
            $this->validate($request, [
                'title'=>'nullable|string',
                'photo'=>'required',
                'status'=>'nullable|in:active,inactive',
            ]);
            $data=$request->all();

            $status=$brandCompany->fill($data)->save();
            if($status){
                return redirect()->route('brand.index')->with('success', 'Successfully updated brand Company');
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
        $brandCompany=BrandCompany::find($id);
        if($brandCompany){
            $status = $brandCompany->delete();
            if($status){
                return redirect()->route('brand.index')->with('success', 'Brand successfully deleted');
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
