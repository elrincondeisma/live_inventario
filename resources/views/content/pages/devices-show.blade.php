@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear nuevo dispositivo')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection
@section('content')
<div class="row">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Creando un dispositivo nuevo</h5> 
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('pages-devices-update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="device_id" value="{{ $device->id }}">
                <img src="{{ $device->image_url }}" alt="" style="width: 20%">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Imagen del dispositivo</label>
                  <input type="file" name="fileLogo" class="form-control" id="basic-default-fullname"  />
                </div>
                <div class="mb-3">
                  <label for="selectpickerIcons" class="form-label">Tipo de dispositivo</label>
                  <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="type_id">
                    @forelse ($types as $type)
                      <option data-icon="bx bx-{{$type->icon}}" @if($type->id == $device->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                        
                    @empty
                        
                    @endforelse
                  </select>
                </div>
                <div class="mb-3">
                  <label for="selectpickerIcons" class="form-label">Sistema Operativo</label>
                  <select class="selectpicker w-100 show-tick" id="selectpickerIcons2" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="sos_id">
                    @forelse ($sos as $so)
                      <option value="{{$so->id}}" @if($so->id == $device->sos_id) selected @endif>{{$so->name}}</option>

                    @empty
                        
                    @endforelse
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nombre</label>
                  <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="" value="{{ $device->name }}" required />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Descripción</label>
                  <input type="text" name="description" class="form-control" id="basic-default-email" value="{{ $device->description }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Número de serie</label>
                  <input type="text" name="serial_number" class="form-control" id="basic-default-email" value="{{ $device->serial_number }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Mac</label>
                  <input type="text" name="mac_address" class="form-control" id="basic-default-email" value="{{ $device->mac_address }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Dirección IP</label>
                  <input type="text" name="ip_address" class="form-control" id="basic-default-email" value="{{ $device->ip_address }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Modelo</label>
                  <input type="text" name="model" class="form-control" id="basic-default-email" value="{{ $device->model }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Fábrica</label>
                  <input type="text" name="manufacturer" class="form-control" id="basic-default-email" value="{{ $device->manufacturer }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Firmware</label>
                  <input type="text" name="firmware" class="form-control" id="basic-default-email" value="{{ $device->firmware }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Stock</label>
                  <input type="text" name="stock" class="form-control" id="basic-default-email" value="{{ $device->stock }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Disco Duro</label>
                  <input type="text" name="hdd" class="form-control" id="basic-default-email" value="{{ $device->hdd }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Memoria Ram</label>
                  <input type="text" name="ram" class="form-control" id="basic-default-email" value="{{ $device->ram }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Cpu</label>
                  <input type="text" name="cpu" class="form-control" id="basic-default-email" value="{{ $device->cpu }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Tarjeta gráfica</label>
                  <input type="text" name="gpu" class="form-control" id="basic-default-email" value="{{ $device->gpu }}" placeholder="" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Slots totales</label>
                  <input type="text" name="total_slots" class="form-control" id="basic-default-email" value="{{ $device->total_slots }}" placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Histórico</label>
                    <textarea class="form-control" name="history" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection
