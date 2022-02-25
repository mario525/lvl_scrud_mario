<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@extends('layouts.app')

@section('content')
<div class="container">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<h1>Mostrando Datos ID # {{ $showcar->id }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Brand:</strong> {{ $showcar->brand_relacion->Name }}  <br>
            <strong>Name:</strong> {{ $showcar->Name }}<br>
            <strong>Model:</strong> {{ $showcar->Model }}
        </p>
    </div>

    <a class="btn btn-primary" href="{{url('cars')}}">Regresar</a>




</div>
@endsection

 

