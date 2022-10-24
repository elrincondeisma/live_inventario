<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Pdf;
use App\Models\Device;

class Reports extends Controller
{
  public function index()
  {
    $reports = Report::all();
    
    return view('content.pages.reports',['reports'=>$reports]);
  }

  public function create(){
    $devices = Device::all();
    // share data to view
    //view()->share('devices',$devices);  
    $date = date('Y-m-d_hh:mm:ss');
    $pdf = Pdf::loadView('pdf.devices',compact('devices'));
    Storage::put('public/pdf/'.$date.".pdf", $pdf->output());
    $report = new Report();
    $report->url = $date.".pdf";
    $report->save();
    return redirect()->route('pages-reports');
    

    //return redirect()->route('pages-reports');
  }
  public function delete($id){
    $report = Report::find($id);
    Storage::delete('public/pdf/'.$report->url);

    $report->delete();
    return redirect()->route('pages-reports');
  }
 
}
