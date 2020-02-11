@extends('layouts.app')
@section('title')
<title>{{$post->title}}</title>
@endsection
@section('content')
<section id="postview">
  <div class="container" id="contenedorgral" style="margin-top:80px;margin-bottom:150px">
    <div class="row no-gutters">
      <div id="linkpostgrd" class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8" style="padding: 0rem .4rem">
        <a href="/{{$post->categoria->name }}">
          <h5>
            <span class="badge badge-secondary" id="btn-grad">{{$post->categoria->name}}</span>
          </h5>
        </a>
        <div class="my-2">
          <h2><strong>{{$post->title}}</strong></h2>
        </div>
        <div>
          <p class="text-muted" style="color:#6c02fc"><i class="fas fa-user mr-2"
              style="color:#6c02fc"></i>{{$post->user->name}}<i class="fas fa-clock ml-2 mr-2"
              style="color:#6c02fc"></i>{{$post->created_at}}</p>
        </div>
        <div class="mt-2 rounded d-flex align-items-end" style="height: 430px;
          background:url({{asset('storage/uploads/' . $post->imagen)}});
          background-size:cover;
          background-position:center;
          -webkit-background-size:cover;">

        </div>
        <div class="my-4">
          {{-- {{$post->post}} --}}
          {!! html_entity_decode($post->post)!!}
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding: 0rem .4rem;margin-top:80px"
        id="sidebar">
        <h3 style="color:#6C02FC"><strong>Otras Noticias</strong></h3>

        <div class="card" style="">

          <div class="" style="height: 200px;
            background: rgb(55,2,128);
            background: linear-gradient(0deg, rgba(55,2,128,1) 7%, rgba(61,6,135,0.9023984593837535) 12%, rgba(108,2,252,0) 36%),url('{{asset('storage/uploads/' . $ppost->imagen)}}');
            background-size:cover;
            background-position:center;
            -webkit-background-size:cover;
                "></div>
          <div class="card-body" style="background:#370280;color:white;padding-top:5px;
                padding-bottom:5px">
            <h5 class="card-title"><a href="{{ route('mostrarpost', $ppost->id) }}"
                style="text-decoraton:none;color:white">{{$ppost->title}}</a></h5>
          </div>
          <ul class="list-group list-group-flush">
            @foreach ($random as $rm)
            <li class="list-group-item" id="ulreview">
              <a href="{{ route('mostrarpost', $rm->id) }}">
                {{$rm->title}}
              </a>
            </li>
            @endforeach

          </ul>

        </div>


      </div>
    </div>



  </div>
</section>

@endsection
