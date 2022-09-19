@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Creando usuario nuevo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Creando un usuario nuevo</h5> 
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('pages-users-store') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nombre completo</label>
                  <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Email</label>
                  <input type="text" name="email" class="form-control" id="basic-default-email" placeholder="example@example.com." />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Password</label>
                    <input type="password" name="password" class="form-control" id="basic-default-password" placeholder="Secret Password" />
                </div>
                
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection
