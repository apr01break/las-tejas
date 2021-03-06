@extends('layouts.admin')

@section('content')
<div class="container col-md-12">
  <div class="panel panel-primary animated fadeInUp">
    <div class="panel-heading" align="center">
          <h2>  Sección de administracion de mesas <a href="{{ route('table.create') }}" class="btn btn-success">Crear Mesa</a>
          </h2>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th>Numero de Mesa</th>
                  <th>Numero de Sillas</th>
                  <th>Estado de Atencion</th>
                  <th>Sucursal</th>
                  <th>Empleado Asignado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tables as $table)
                  <tr>
                    <td  class="align-middle">{{$table-> NUMBER}}</td>
                    <td  class="align-middle">{{$table-> CHAIRS}}</td>
                    <td  class="align-middle">{{$table-> STATUS}}</td>
                    <td  class="align-middle">{{$table-> SUCURSAL}}</td>
                    <td  class="align-middle">{{$table-> USER}} {{$table->FIRST}} {{$table->SECOND}}</td>
                    <td  class="align-middle"><a href="{{route('table.show',$table-> CODIGO)}}" class="btn btn-primary pull-right">Ver</a></td>
                    <td  class="align-middle"><a href="{{route('table.edit',$table-> CODIGO)}}" class="btn btn-warning pull-right">Actualizar</a></td>
                    <td  class="align-middle"><a href="" data-target="#modal-delete-{{$table->CODIGO}}" data-toggle="modal" class="btn btn-danger pull-right">Eliminar</a></td>
                <!--@include('table.destroy')-->
                @endforeach
              </tbody>
          </table>
          <script>
          $("#deletegroup").on("submit", function(){
            console.log('click');
            return confirm("¿Estas seguro que desa eliminar la mesa?");
          });
          </script>
        </div>
      <div class="col-md-12">
        {{$tables->render()}}
      </div>
  </div>
</div>
</div>
@foreach ($tables as $table)
  @include('table.destroy')
@endforeach
@endsection
