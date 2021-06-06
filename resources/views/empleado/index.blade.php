@extends('layouts.app')
<body style="background-image: url(../img/fondo.jpg)">
@section('content')
<div class="container p-2 shadow p-3 mb-5 bg-body rounded" style="background-color:rgba(255,255,255, 0.8)">


  @if(Session::has('mensaje'))
  <div class="alert alert-success alert-dismissible" role="alert">
  {{ Session::get('mensaje') }}
  <button type="buttom" class="close" data-dismiss="alert" arial-label="Close">
<span arial-hidden="true">&times;</span>
</button>

</div>
  @endif




<a href="{{ url('empleado/create') }}" class="btn btn-success"> Registrar nuevo empleado</a>
<br>
<br>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Apellidos</th>

      <th>Correo</th>
      <th>Telefono</th>
      <th>Fecha Nacimiento</th>
      <th>Acciones</th>
    </tr>
  </thead>


  <tbody>
    @foreach( $empleados as $empleado )
    <tr>
      
      <td>{{ $empleado->id }}</td>

      <td>
      <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" alt="">
      </td>

      <td>{{ $empleado->Nombre }}</td>
      <td>{{ $empleado->Apellido1 }} {{ $empleado->Apellido2 }}</td>
      <td>{{ $empleado->Correo }}</td>
      <td>{{ $empleado->Telefono }}</td>
      <td>{{ $empleado->FechaNacimiento }}</td>
      <td>
      
      <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
        Editar
      </a>
      
      
       | 
      <form action="{{ url('/empleado/'.$empleado->id ) }}" class="d-inline" method="post">
      @csrf 
      {{ method_field('DELETE') }}


      
      <input  class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" 
      value="Borrar">

      </form>
      
      
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{!! $empleados->links() !!}
</div>
@endsection
</body>