<?php

namespace App\Exports;

use App\Models\Device;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DeviceExport implements FromView
{
    public function view(): View
    {
        return view('exports.devices', [
            'devices' => Device::all()
        ]);
    }
}
