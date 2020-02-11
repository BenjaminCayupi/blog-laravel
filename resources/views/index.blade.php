@extends('layouts.app')
@section('title')
<title>Blog | Inicio</title>
@endsection
@section('content')
<div>
    <section id="post-head">
        <div class="container" id="contenedorgral">
            <div class="row no-gutters" id="post-header">
                <div id="linkpostgrd" class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8" style="padding: 0rem .4rem">
                    @foreach ($post1 as $postuno)
                    <a href="{{route('mostrarpost',$postuno->id)}}" style="display:block;">
                        
                        <div class="mt-2 rounded d-flex align-items-end" style="height: 430px;
                                background: rgb(0,0,0);
                                background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.9) 20%, rgba(255,255,255,0) 60%),url({{asset('storage/uploads/' . $postuno->imagen)}});
                                background-size:cover;
                                background-position:center;
                                -webkit-background-size:cover;">
                            <div class="py-3 px-4" id="content">

                                <h2 id="titleposth"><strong>{{$postuno->title}}</strong>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    </a>

                </div>
                <div id="linkpostgrd" class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 justify-content-between"
                    style="padding: 0rem .4rem;">
                    @foreach ($post2 as $postdos)
                    <a href="{{route('mostrarpost' , $postdos->id)}}" style="display: block;">
                        <div class="mt-2 rounded d-flex align-items-end" style="height: 210px;
                        background: rgb(0,0,0);
                        background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.9) 32%, rgba(255,255,255,0) 60%),url('{{asset('storage/uploads/' . $postdos->imagen)}}');
                        background-size:cover;
                        background-position:center;
                        -webkit-background-size:cover;
                            ">
                            <div class="py-2 px-3" id="content">
                                <h5 id="titleposth"><strong>{{$postdos->title}}</strong>
                                </h5>
                            </div>
                        </div>
                        @endforeach
                    </a>
                    @foreach ($post3 as $posttres)
                    <a href="{{ route('mostrarpost',$posttres->id)}}" style="display: block;">
                        <div class="mt-2 rounded d-flex align-items-end" style="height: 210px;
                        background: rgb(0,0,0);
                        background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.9) 32%, rgba(255,255,255,0) 60%),url('{{asset('storage/uploads/' . $posttres->imagen)}}');
                        background-size:cover;
                        background-position:center;
                        -webkit-background-size:cover;
                            ">
                            <div class="py-2 px-3" id="content">
                                <h5 id="titleposth"><strong>{{$posttres->title}}</strong>
                                </h5>
                            </div>

                            @endforeach
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="main my-4" style="background: #ffffff;">
        <div class="container" id="contenedorgral">
            <div class="row no-gutters" style="padding-top: 6px;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8"
                    style="padding: 0rem .4rem;margin-bottom: 90px">
                    <h3 style="color:#6C02FC"><strong>Ultimos Post</strong></h3>
                    <div id="posts">
                        @foreach ($ultpost as $upost)
                        <div class="" style="">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a href="{{route('mostrarpost',$upost->id)}}" style="display: block;">
                                            <div id="postimgg" style="
                                          min-height:150px;
                                          background:url('{{asset('storage/uploads/' . $upost->imagen)}}');
                                          background-size: cover;
                                          background-position: center;">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5><a href="{{route('mostrarpost',$upost->id)}}" class="card-title"
                                                    id="headlink">{{$upost->title}}</a></h5>
                                            <a href="/{{strtolower($upost->categoria->name)}}">
                                                <h6>
                                                    <span class="badge badge-secondary"
                                                        id="btn-grad">{{$upost->categoria->name}}</span>
                                                </h6>
                                            </a>
                                            <p class="card-text"><span class="text-muted">{{$upost->created_at}} |
                                                    {{$upost->user->name}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        <div class="d-flex justify-content-center">

                            <a href="{{ route('todpost') }}" class="btn btn-outline-primary rounded-pill"
                                id="btn-grad2">Ver todos los
                                post</a>
                        </div>


                    </div>



                </div>
                <!-- ***** ----- SIDEBAR ----- ***** -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding: 0rem .4rem;" id="sidebar">
                    <h3 style="color:#6C02FC"><strong>Reviews</strong></h3>

                    <div class="card" style="">

                        <div class="" style="height: 200px;
                        background: rgb(55,2,128);
                        background: linear-gradient(0deg, rgba(55,2,128,1) 7%, rgba(61,6,135,0.9023984593837535) 12%, rgba(108,2,252,0) 36%),url('{{asset('storage/uploads/' . $review->imagen)}}');
                        background-size:cover;
                        background-position:center;
                        -webkit-background-size:cover;
                            "></div>


                        <div class="card-body" style="background:#370280;color:white;padding-top:5px;
                            padding-bottom:5px">
                            <h5 class="card-title"><a href="{{ route('mostrarpost', $review->id) }}"
                                    style="text-decoraton:none;color:white">{{$review->title}}</a></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($reviews as $rv)
                            <li class="list-group-item" id="ulreview">
                                <a href="{{ route('mostrarpost', $rv->id) }}">
                                    {{$rv->title}}
                                </a>
                            </li>
                            @endforeach

                        </ul>

                    </div>


                </div>
            </div>

        </div>

    </section>
</div>

@endsection
