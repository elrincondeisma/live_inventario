@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos')

@section('content')
<h4>Tipos de dispositivos</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">
      <a href="{{ route('pages-types-create') }}" class="btn btn-primary">Añadir nuevo tipos</a>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                      @if ($type->active)
                      <a href="{{ route('pages-types-switch',$type->id) }}">  
                      <span class="badge bg-primary">Activo</span></a>
                      @else
                      <a href="{{ route('pages-types-switch',$type->id) }}">
                        <span class="badge bg-danger">Inactivo</span></a>

                      @endif
                    </td>
                    <td>{{ $type->created_at }}</td>
                    <td><a href="{{ route('pages-types-show', $type->id) }}" >Editar </a> | <a href="{{ route('pages-types-destroy', $type->id) }}">Borrar</a></td>    
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
