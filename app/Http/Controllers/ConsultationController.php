<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    //
    public function index()
    {
        $consultations = Consultation::orderBy('id', 'DESC')->get();
        return view('backend.consultations.index', compact('consultations'));
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::find($id);
        if($consultation){
            $this->validate($request, [
                'full_name' => 'string|nullable',
                'email' => 'string|nullable',
                'sujet' => 'string|nullable',
                'message' => 'string|nullable',

                'response'=>'string|nullable',
            ]);
            $data=$request->all();

            $status=$consultation->fill($data)->save();
            if($status){
                return redirect()->route('consultation.index')->with('success', 'Successfully updated banner');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }
}
