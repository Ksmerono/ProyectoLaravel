<body style="background-image: url(https://image.freepik.com/vector-gratis/patron-geometrico-abstracto_1319-110.jpg)">

<h1 class="font-weight-bold" style="color:white; text-shadow: 2px 2px 10px black">{{ $modo }} Empleado</h1>

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

<div class="form-group col-md-4">
<label for="Nombre"> Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">
</div>
<div class="form-group col-md-4">
<label for="Apellido1">Apellido 1</label>
<input type="text" class="form-control" name="Apellido1" value="{{ isset($empleado->Apellido1)?$empleado->Apellido1:old('Apellido1') }}" id="Apellido1">
</div>
<div class="form-group col-md-4">
<label for="Apellido2">Apellido 2</label>
<input type="text" class="form-control" name="Apellido2" value="{{ isset($empleado->Apellido2)?$empleado->Apellido2:old('Apellido2') }}" id="Apellido2">
</div>

</div>
<div class="row">

<div class="form-group col-md-7">
<label for="Correo">Email</label>
<input type="text" class="form-control" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" id="Correo">
</div>
<div class="form-group col">
    <label for="Telefono">Telefono</label>
    <input type="text" class="form-control" name="Telefono" value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}" id="Telefono">
</div>

</div>
<div class="row">


<div class="form-group col-md-6">
    <label for="FechaNacimiento">Fecha Nacimiento</label>
    <input type="date" class="form-control" name="FechaNacimiento" value="{{ isset($empleado->FechaNacimiento)?$empleado->FechaNacimiento:old('FechaNacimiento') }}" id="FechaNacimiento">
</div>

<div class="form-group col">
<label for="Foto" >Foto</label><br>
<div class="custom-file">
<input type="file" class="custom-file-input" name="Foto" value="" id="Foto">
<label class="custom-file-label" for="Foto">Seleccione una foto</label>
</div>
</div>

<div class="form-group col-md-2">
    @if(isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100px" alt="">
@endif
</div>
</div>



<input type="submit" class="btn btn-success" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('empleado/') }}"> Regresar</a>

</div>
</body>