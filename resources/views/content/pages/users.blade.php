@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
<h4>Usuarios de la aplicación</h4>
<!-- Basic Bootstrap Table -->
@role('admin')
<div class="card">
    <div class="table-responsive text-nowrap">
      <a href="{{ route('pages-users-create') }}" class="btn btn-primary">Añadir nuevo usuario</a>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Creado en</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->hasRole('admin'))
                        <a href="{{ route('pages-users-switch-role',$user->id) }}">    
                        <span class="badge bg-primary">Administrador</span></a>
                        @else
                            <a href="{{ route('pages-users-switch-role',$user->id) }}">
                            <span class="badge bg-success">Usuario</span></a>
                        @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('pages-users-show', $user->id) }}" >Editar </a> | <a href="{{ route('pages-users-destroy', $user->id) }}">Borrar</a></td>    
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endrole
@role('user')
<div class="card">
  <h1 class="text-danger">NO TIENES PERMISOS PARA VER ESTA SECCIÓN</h1>
</div>
@endrole
@endsection
