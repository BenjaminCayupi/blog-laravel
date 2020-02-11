@extends('layouts.dashboard')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Crear Categoria </h1>
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
  <form method="POST" action="{{route('storecateg')}}">
    @csrf
    <div class="card-body pad">
      <div class="form-group">
        <label for="titulo">Titulo Categoria</label>
        <input type="text" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" id="nombre" name="nombre" placeholder="Ingrese un nombre" value="{{old('nombre')}}">
        @error('nombre')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>




    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>

</div>
@endsection
