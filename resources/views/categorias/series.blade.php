@extends('layouts.app')
@section('title')
<title>Blog | Series</title>
@endsection
@section('content')
<section id="postview">
  <div class="container" id="contenedorgral" style="margin-top:80px;margin-bottom:80px">
    <div class="row no-gutters">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8"style="padding: 0rem .4rem;margin-bottom: 30px">
        <div id="header" style="" class="d-flex justify-content-between mb-4">
          <h1 class="align-self-center" style="color:#6c02fc">Serie</h1>
          <img src="{{asset('img/ser.svg')}}" alt="" srcset="" height="102px">
        </div>
        @foreach ($series as $post)

          <div class="card mb-3" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <a href="{{route('mostrarpost',$post->id)}}" style="display: block;">
                  <div id="postimgg" style="
                        min-height:150px;
                        background:url('{{asset('storage/uploads/' . $post->imagen)}}');
                        background-size: cover;
                        background-position: center;">
                  </div>
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a href="{{route('mostrarpost',$post->id)}}" class="card-title" id="headlink">{{$post->title}}</a>
                  <p class="card-text"><span class="text-muted">{{$post->created_at}} | {{$post->user->name}}</span>
                  </p>
                </div>
              </div>
            </div>
          </div>

        @endforeach
        <div>{{$series->links()}}</div>


      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding: 0rem .4rem;" id="sidebar">
        <h3 style="color:#6c02fc">Noticias que podrian interesarte</h3>
        <div class="" style="margin-top:61px">
          <div class="card" style="">

            <div class="" style="height: 200px;
            background: rgb(55,2,128);
            background: linear-gradient(0deg, rgba(55,2,128,1) 7%, rgba(61,6,135,0.9023984593837535) 12%, rgba(108,2,252,0) 36%),url('{{asset('storage/uploads/' . $ser->imagen)}}');
            background-size:cover;
            background-position:center;
            -webkit-background-size:cover;
                "></div>


            <div class="card-body" style="background:#370280;color:white;padding-top:5px;
                padding-bottom:5px">
              <h5 class="card-title"><a href="{{ route('mostrarpost', $ser->id) }}" style="text-decoraton:none;color:white">{{$ser->title}}</a></h5>
            </div>
            <ul class="list-group list-group-flush">

              <li class="list-group-item" id="ulreview">
                <a href="{{ route('mostrarpost', $cin->id) }}">
                  {{$cin->title}}
                </a>
              </li>
              <li class="list-group-item" id="ulreview">
                <a href="{{ route('mostrarpost', $tec->id) }}">
                  {{$tec->title}}
                </a>
              </li>
              <li class="list-group-item" id="ulreview">
                <a href="{{ route('mostrarpost', $vid->id) }}">
                  {{$vid->title}}
                </a>
              </li>
              <li class="list-group-item" id="ulreview">
                <a href="{{ route('mostrarpost', $ani->id) }}">
                  {{$ani->title}}
                </a>
              </li>
              <li class="list-group-item" id="ulreview">
                <a href="{{ route('mostrarpost', $com->id) }}">
                  {{$com->title}}
                </a>
              </li>




            </ul>

          </div>

        </div>
      </div>
    </div>


</section>

@endsection
