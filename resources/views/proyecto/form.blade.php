<body style="background-image: url(https://image.freepik.com/vector-gratis/patron-geometrico-abstracto_1319-110.jpg)">

    <h1 class="font-weight-bold" style="color:white; text-shadow: 2px 2px 10px black">{{ $modo }} Proyecto</h1>

@if(Session::has('mensajeAlert'))
<div class="alert alert-danger alert-dismissible" role="alert">
{{ Session::get('mensajeAlert') }}
<button type="buttom" class="close" data-dismiss="alert" arial-label="Close">
<span arial-hidden="true">&times;</span>
</button>

</div>
@endif

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>
    @foreach( $errors->all() as $error) 
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>

@endif

<div class="container p-2 shadow p-3 mb-5 bg-body rounded" style="background-color:rgba(255,255,255, 0.8) ">

<div class="row">
<div class="form-group col-md-5">
<label for="Nombre">Nombre:</label>
<input type="text" class="form-control" name="Nombre"  value="{{ isset($proyecto->Nombre)?$proyecto->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group col-md-4">
<label for="Area">Area:</label>
<input type="text" class="form-control" name="Area" value="{{ isset($proyecto->Area)?$proyecto->Area:old('Area') }}" id="Area">
</div>

<div class="form-group col-md-3">
<label for="Estado">Estado:</label>
<input type="text" class="form-control" name="Estado" value="{{ isset($proyecto->Estado)?$proyecto->Estado:old('Estado') }}" id="Estado">
</div>
</div>


<div class="row">
<div class="form-group col-md-4">
<label for="Fecha_Inicio">Fecha Inicio:</label>
<input type="date" class="form-control" name="Fecha_Inicio" value="{{ isset($proyecto->Fecha_Inicio)?$proyecto->Fecha_Inicio:old('Fecha_Inicio') }}" id="Fecha_Inicio">
</div>

<div class="form-group col-md-4">
<label for="Fecha_Final">Fecha Final:</label>
<input type="date" class="form-control" name="Fecha_Final" value="{{ isset($proyecto->Fecha_Final)?$proyecto->Fecha_Final:old('Fecha_Final') }}" id="Fecha_Final">
</div>

<div class="form-group col-md-4">
<label for="id_empleado">Id del empleado asignado:</label>
<input type="number" class="form-control" name="id_empleado" value="{{ isset($proyecto->id_empleado)?$proyecto->id_empleado:old('id_empleado')  }}" id="id_empleado">
</div>
</div>

<input type="submit" class="btn btn-success" value="{{$modo}} Proyecto">

<a class="btn btn-primary" href="{{ url('proyecto/') }}">Regresar</a>

</div>
</body>