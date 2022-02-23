<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\DocumentPdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPDFViewController extends Controller
{
    //
    public function index()
    {
        $documentPDF = DocumentPdf::where('status','activer')->orderBy('id','DESC')->get();

        return view('frontend.pages.mesDroits.document',compact('documentPDF'));
    }


    public function showPDF($slug)
    {
        $contrat = DocumentPdf::where('slug',$slug)->first();
        if($contrat){
            return view('frontend.pages.mesDroits.show-pdf',compact('contrat'));
        }
        else{
            abort(404);
        }
    }


    public function downloadPDF($id)
    {
        $contrat = DocumentPdf::find($id);
        $pdf = PDF::loadView('frontend.pages.mesDroits.show-pdf',compact('contrat'));
        return $pdf->download('contrat.pdf');
    }

}
