<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\So;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Mail\ExampleMail;
use App\Mail\UpdateDevice;
use Illuminate\Support\Facades\Mail;
use App\Exports\DeviceExport;
use Maatwebsite\Excel\Facades\Excel;

class Devices extends Controller
{
  public function index()
  {
    $devices = Device::all();
    
    return view('content.pages.devices',['devices'=>$devices]);
  }
  public function create()
  {
    $sos= So::where('active',true)->get();
    $types= Type::where('active',true)->get();
    return view('content.pages.devices-create',['sos'=>$sos,'types'=>$types]);
  }
  public function store(Request $request){
    $validator = $request->validate([
      'name' => 'required',
    ]);
    $device = new Device();
    $device->name = $request->name;
    $device->description = $request->description;
    $device->sos_id = $request->sos_id;
    $device->type_id = $request->type_id;
    $device->serial_number = $request->serial_number ?? null;
    $device->mac_address = $request->mac_address ?? null;
    $device->ip_address = $request->ip_address ?? null;
    $device->model = $request->model ?? null;
    $device->manufacturer = $request->manufacturer ?? null;
    $device->firmware = $request->firmware ?? null;
    $device->stock = $request->stock ?? null;
    $device->hdd = $request->hdd ?? null;
    $device->ram = $request->ram ?? null;
    $device->stock = $request->stock ?? 1;
    $device->cpu = $request->cpu ?? null;
    $device->gpu = $request->gpu ?? null;
    $device->total_slots = $request->total_slots ?? null;
    $device->history = $request->history ?? null;
    $device->save();

    //Mandar mail
    Mail::to('ismael@elrincondeisma.com')->send(new ExampleMail($device));



    return redirect()->route('pages-devices');
  }
  public function show($device_id){
    $device = Device::find($device_id);
    $sos= So::where('active',true)->get();
    $types= Type::where('active',true)->get();
    return view('content.pages.devices-show',['device'=>$device,'sos'=>$sos,'types'=>$types]);
  }
  public function update(Request $request){

    

    $validator = $request->validate([
      'name' => 'required',
    ]);
    $device = Device::find($request->device_id);
    if ($request->hasFile('fileLogo')) {
      $file = $request->file('fileLogo');
      $name = time() . $file->getClientOriginalName();
      $filePath = '/public/' . $name;
      Storage::put($filePath, file_get_contents($file));

      $url =  Storage::url($filePath);
      $array = explode('/storage//public/', $url);

      $device->image_url = '/storage/'.$array[1];
    }
    $device->name = $request->name;
    $device->description = $request->description;
    $device->sos_id = $request->sos_id;
    $device->type_id = $request->type_id;
    $device->serial_number = $request->serial_number ?? null;
    $device->mac_address = $request->mac_address ?? null;
    $device->ip_address = $request->ip_address ?? null;
    $device->model = $request->model ?? null;
    $device->manufacturer = $request->manufacturer ?? null;
    $device->firmware = $request->firmware ?? null;
    $device->stock = $request->stock ?? null;
    $device->hdd = $request->hdd ?? null;
    $device->ram = $request->ram ?? null;
    $device->stock = $request->stock ?? 1;
    $device->cpu = $request->cpu ?? null;
    $device->gpu = $request->gpu ?? null;
    $device->total_slots = $request->total_slots ?? null;
    $device->history = $request->history ?? null;
    $device->save();

    Mail::to('ismael@elrincondeisma.com')->send(new UpdateDevice($device));

    return redirect()->route('pages-devices');
  }
  public function destroy($device_id){
    $device = Device::find($device_id);
    $device->delete();
    return redirect()->route('pages-devices');
  }
  public function switch($devices_id){
    $device = Device::find($devices_id);
    $device->active = !$device->active;
    $device->save();
    return redirect()->route('pages-devices');
  }
  public function export(){
    return Excel::download(new DeviceExport, 'devices.xlsx');
  }
}
