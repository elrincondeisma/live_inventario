@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Reportes en pdf')

@section('content')
<h4>Reportes en pdf</h4>
<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="table-responsive text-nowrap">
      <a href="{{ route('pages-reports-create') }}" class="btn btn-primary">Crear nuevo Report</a>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->created_at }}</td>
                    
                    <td>
                        <a href="/storage/pdf/{{ $report->url }}" >download </a> | <a href="{{ route('pages-reports-destroy', $report->id) }}">Borrar</a> 
                    </td>    
                </tr>
            @endforeach 
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
