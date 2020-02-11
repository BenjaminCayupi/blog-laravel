@extends('layouts.dashboard')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Editar Post | ID= {{$post->id}}</h1>
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
  <form method="POST" action="{{ route('postupdate', $post->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card-body pad">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid' : ''}}" id="titulo" name="titulo" placeholder="Ingrese un titulo" value="{{old('titulo') ?? $post->title}}">
        @error('titulo')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label>Categoria</label>
        <select class="form-control" name="categoria">
          <option selected disabled hidden>Seleccione una categoria</option>
          @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}" {{$post->categoria_id == $categoria->id  ? 'selected' : ''}}>{{ $categoria->name}}</option>
          @endforeach

        </select>
        @error('categoria')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
        @error('imagen')
        <div class="invalid-feedback d-block">
          {{$message}}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="post">Cuerpo</label>
        <textarea class="textarea" placeholder="Place some text here"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
          name="post">{{$post->post}}</textarea>
          @error('categoria')
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
@section('script')
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote({
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
],
      })
    })
  </script>
@endsection
