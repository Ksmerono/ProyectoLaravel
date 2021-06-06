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


@if(Session::has('mensajeAlert'))
<div class="alert alert-danger alert-dismissible" role="alert">
{{ Session::get('mensajeAlert') }}
<button type="buttom" class="close" data-dismiss="alert" arial-label="Close">
<span arial-hidden="true">&times;</span>
</button>

</div>
@endif



<a href="{{ url('proyecto/create') }}" class="btn btn-success">Registrar nuevo proyecto</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Area</th>
            <th>Estado</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Id Empleado asignado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $proyectos as $proyecto )
        <tr>
            <td>{{ $proyecto->id }}</td>
            <td>{{ $proyecto->Nombre }}</td>
            <td>{{ $proyecto->Area }}</td>
            <td>{{ $proyecto->Estado }}</td>
            <td>{{ $proyecto->Fecha_Inicio }}</td>
            <td>{{ $proyecto->Fecha_Final }}</td>
            <td>{{ $proyecto->id_empleado }}</td>
            <td>
                
            <a href="{{ url('/proyecto/'.$proyecto->id.'/edit') }}" class="btn btn-warning">
                Editar</a>  
                
                | 
            
            <form action="{{ url('/proyecto/'.$proyecto->id) }}" class="d-inline" method="post">
            @csrf
            {{ @method_field('DELETE')}}

            <input class="btn btn-danger" type="submit" onclick=" return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{!! $proyectos->links() !!}
</div>
@endsection
</body>