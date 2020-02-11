@extends('layouts.dashboard')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Ver Usuarios</h1>
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

<div class="col-12">
  @if ( session('mensaje') )
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="icon fas fa-check mr-2"></i>{{ session('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  @endif
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Posts</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-sm table-responsive-sm table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Creado</th>
            <th>Ult. Mod</th>
            <th>Opt</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td class="d-flex justify-content-between" style="">
              <a href="{{route('usereditar', $user->id)}}" class="btn btn-sm btn-info mr-1" style="width:48%"><i
                  class="far fa-edit" style="color:white"></i></a>

            <form action="{{route('userdelete' , $user->id)}}" method="POST" class="d-inline" style="width:48%">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger" style="width:100%"><i
                  class="far fa-trash-alt"></i></button>
            </form>


            </td>
          </tr>

          @endforeach

        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>

@endsection
@section('script')
<script>
  $(function () {
        $("#example1").DataTable();

      });
</script>

@endsection
