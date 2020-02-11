@extends('layouts.app')
@section('content')
<div class="container" id="contenedorgral">
    <div class="row justify-content-between" style="padding-top:120px;padding-bottom:100px">
        <div class="col-md-6 col-lg-7 col-xl-7">
            <img src="{{ asset('img/404.svg') }}" class="d-sm-none d-md-block d-none d-xs-block" alt="Kiwi standing on oval" width="100%">
        </div>
        <div class="col-md-6 col-lg-5 col-xl-5">
            <h1><strong>Error 404:</strong></h1>
            <h4>La pagina que estas buscando no existe.</h4>
        </div>
    </div>
</div>


@endsection
