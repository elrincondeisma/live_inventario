@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Tipo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Actualizando tipo</h5> 
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('pages-types-update') }}">
                @csrf
                <input type="hidden" name="type_id" value="{{ $type->id }}">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nombre completo</label>
                  <input type="text" name="name" value="{{ $type->name }}" class="form-control" id="basic-default-fullname" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Email</label>
                  <input type="text" name="description" value="{{ $type->description }}" class="form-control" id="basic-default-email"  />
                </div>
                
                
                
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection
