<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>


@extends('layouts.app')

@section('content')
<div class="container">
<!-- Mensaje de Eliminacion o Agregado-->

  @if(Session::has('mensaje'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
{{Session::get('mensaje')}} 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif







    <a href="{{url('cars/create')}}" class="btn btn-success">
    <i class="fa fa-plus-circle" aria-hidden="true"></i>
    Registrar Nuevo Carro</a>
    <br>
    <br>
    <div>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Brand</th>
        <th scope="col">Name</th>
        <th scope="col">Model</th>
        <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carros as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->brand_relacion->Name}}</td>
            <td>{{$item->Name}}</td>
            <td>{{$item->Model}}</td>
            <td>

            <a href="{{url('cars/'.$item->id)}}" class="btn btn-primary" >
            <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a href="{{url('cars/'.$item->id).'/edit'}}" class="btn btn-warning" >
                <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                </a>
             
                <form action="{{ url('cars/'.$item->id) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger"  type="submit" onclick="return confirm('¿Quieres borrar?')">
                    <i class="fa fa-trash" aria-hidden="true"> </i>
                </button>
                </form>
        </td>
        
        </tr>
        @endforeach
    </tbody>
</table>
{!! $carros->links()!!}
    </div>

</div>
@endsection
</body>
</html>