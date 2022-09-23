@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dispositivos')

@section('content')
<h4>Dispositivos</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">
      <a href="{{ route('pages-devices-create') }}" class="btn btn-primary">Añadir nuevo dispositivo</a>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($devices as $device)
                <tr>
                    <td>{{ $device->id }}</td>
                    <td>{{ $device->name }}</td>
                    <td><span class="badge bg-primary"><i class="{{ $device->type->icon }}"></i></span>
                      
                    <td>
                      @if ($device->active)
                      <a href="{{ route('pages-devices-switch',$device->id) }}">  
                      <span class="badge bg-primary">Activo</span></a>
                      @else
                      <a href="{{ route('pages-devices-switch',$device->id) }}">
                        <span class="badge bg-danger">Inactivo</span></a>

                      @endif
                    </td>
                    <td>{{ $device->created_at }}</td>
                    <td><a href="{{ route('pages-devices-show', $device->id) }}" >Editar </a> | <a href="{{ route('pages-devices-destroy', $device->id) }}">Borrar</a></td>    
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
