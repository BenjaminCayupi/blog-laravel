@extends('layouts.dashboard')
@section('header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Listado de Post</h1>
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
            <th>Titulo</th>
            <th>Categoria</th>
            @if (auth()->user()->role_id == 1)
            <th>posteado por</th>
            @endif
            <th>Creado</th>
            <th>Ult. Mod</th>
            <th>Opt</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->categoria->name}}</td>
            @if (auth()->user()->role_id == 1)
            <td>{{$post->user->name}}</td>
            @endif
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td class="d-flex justify-content-between" style="">

              <a href="{{route('mostrarpost',$post->id)}}" class="btn btn-sm btn-success mr-1" style="width:48%"><i
                  class="far fa-eye" style="color:white"></i></a>
              <a href="{{route('posteditar', $post->id)}}" class="btn btn-sm btn-info mr-1" style="width:48%"><i
                  class="far fa-edit" style="color:white"></i></a>
            @if (auth()->user()->role_id == 1)
            <form action="{{route('postdelete' , $post->id)}}" method="POST" class="d-inline" style="width:48%">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger" style="width:100%"><i
                  class="far fa-trash-alt"></i></button>
            </form>
            @endif

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
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
</script>

@endsection
