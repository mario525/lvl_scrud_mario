
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
</head>
<body>
@extends('layouts.app')



@section('content')
<div class="container">
<h1 class="text-center"> Registrar Carro </h1>

<!-- Busca Errores en el Forumario para luego recargar y enlistarlo-->
@if(count($errors)>0)
<div class="alert alert-danger col-md-7" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

 @endif


{!! Form::open(['url'=> 'cars/store', 'method'=> 'put']) !!}
@csrf

<div class="jumbotron col-md-7">
  <div class="form-group  col-md-4">
    <label for="inputAddress"> <strong>Marcas</strong> </label>
    {{Form::select('brand_id',$marcas,null,['class'=>'form-select form-select-lg','id'=>'brand'])}}
  </div>
  
  <div class="form-group col-md-9">
      <label for="inputPassword4"> <strong>Nombre</strong> </label>
      {!! Form::text('name',null,['class'=>'form-control','id'=>'Nombre']) !!}
      
    </div>
    <div class="form-group col-md-9">
      <label for="inputEmail4"> <strong>Modelo</strong> </label>
      {!! Form::text('model',null,['class'=>'form-control','id'=>'Modelo']) !!}
    </div>
</div>
  
  <button type="submit" class="btn btn-success">Guardar</button>
  <a class="btn btn-primary" href="{{url('cars')}}">Regresar</a>
  {!! Form:: close()!!}
</div>

@endsection

</body>



     <script >
     $(function(){
      getBrand();


function getBrand(){ 
     // console.log("dfsdjfds");
     var brands = $('#brand');
          $.ajax({
            type: 'GET',
            crossDomain: true,
            dataType: 'json',
            url: "{{ url('cars/getBrand/') }}",
            success: function(marcas){
              
              brands.empty();
              console.log(marcas);
              $.each(marcas, function(){
                  brands.append($("<option />").val(this.id).text(this.Name));
              });
            },
            error: function() {
           
            }
          })
        }

        });


     </script>

</html>




