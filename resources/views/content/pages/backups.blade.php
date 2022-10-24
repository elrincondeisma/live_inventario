@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Backups: Disaster Recovery')

@section('content')
<h4>Backups: Disaster Recovery</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">
      <a href="{{ route('pages-backups-create') }}" class="btn btn-primary">Crear nuevo Backup</a>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Estado</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($backups as $backup)
                <tr>
                    <td>{{ $backup->id }}</td>
                    <td>{{ $backup->status }}</td>
                    <td>{{ $backup->created_at }}</td>
                    
                    <td>
                        <a href="{{ $backup->url }}" >download </a> | <a href="{{ route('pages-backups-destroy', $backup->id) }}">Borrar</a> 
                    </td>    
                </tr>
            @endforeach 
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
