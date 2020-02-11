@extends('layouts.dashboard')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Editar Usuario | ID= {{$user->id}}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Starter Page</li>
      </ol>
    </div>
  </div>

</div>

@endsection
@section('content')
<div class="col-md-12">

  @if (session('mensaje'))
  <div class="alert alert-success">{{session('mensaje')}}</div>
  @endif
<div class="card">
  <form method="POST" action="{{ route('userupdate',
  $user->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card-body pad">
      <div class="form-group">
        <label for="titulo">Nombre usuario</label>
        <input type="text" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" id="nombre" name="nombre" placeholder="Ingrese un nombre" value="{{old('nombre')??$user->name}}">
        @error('nombre')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="titulo">Correo</label>
        <input type="email" class="form-control {{$errors->has('correo') ? 'is-invalid' : ''}}" id="correo" name="correo" placeholder="Ingrese un Correo" value="{{old('correo')??$user->email}}">
        @error('correo')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label>Rol</label>
        <select class="form-control" name="rol">
          <option selected disabled hidden>Seleccione un Rol</option>
          @foreach ($roles as $rol)
          <option value="{{ $rol->id }}" {{$user->role_id == $rol->id  ? 'selected' : ''}}>{{ $rol->name}}</option>
          @endforeach
        </select>
        @error('rol')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>



    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
</div>

</div>
@endsection
