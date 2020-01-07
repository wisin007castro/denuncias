@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')


<section  id="contenido_principal">

<div class="box box-primary box-white">

     <div class="box-header">
        <h4 class="box-title">Denuncias</h4>	        
        <form   action="{{ url('reporte_usuarios') }}"  method="post"  >
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
			{{-- <div class="input-group input-group-sm">
				<input type="text" class="form-control" value="" id="dato_buscado" name="dato_buscado" required>
				<span class="input-group-btn">
				<input type="submit" class="btn btn-primary" value="buscar" >
				</span>
			</div> --}}
		</form>
{{-- {{$denuncias}} --}}
{{-- 
		<div class="margin" id="botones_control">
			<a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(1);">Agregar Usuario</a>
			<a href="{{ url("/listado_usuarios") }}"  class="btn btn-xs btn-primary" >Listado Usuarios</a> 
			<a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
			<a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>                                 
		</div> --}}

    </div>

<div class="box-body box-white">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
			<thead>
				<tr>    
					<th>No.</th>
					<th>Nombre Completo</th>
					<th>C.I.</th>
					<th>Dirección</th>
					<th>Correo Electronico</th>
					{{-- <th>Departamento</th>
					<th>Telefono</th>
					<th>Tipo Empresa</th>
					<th>Link de Oferta</th>
					<th>Razón Social</th>
					<th>NIT</th>
					<th>Teléfono</th>
					<th>Dirección de compra</th> --}}
					<th>Lugar del Hecho</th>
					<th>Locación Específica</th>
					<th>Nombre del Denunciado</th>
					<th>Descripción del Hecho</th>
					<th>Documentación Adjunta</th>
					<th>Acción</th>

					{{-- <th>Dependencia</th>
					<th>Fecha ingreso</th>
					<th>Fecha de Retiro</th>
					<th width="10%">Acción</th> --}}
				</tr>
			</thead>
	    <tbody>

			@foreach($denuncias as $value => $denuncia)
			@php
				$extension = $denuncia->extension;
			@endphp
		<tr role="row" class="odd">
			{{-- <td>{{ $denuncia->id }}</td> --}}
			<td>{{ $value + 1 }}</td>
			<td>{{ $denuncia->nombre }} {{ $denuncia->apellidos }}</td>
			<td>{{ $denuncia->ci }}</td>
			<td>{{ $denuncia->direccion }}</td>
			<td>{{ $denuncia->email }}</td>
			{{-- <td>{{ $denuncia->dpto_denunciante }}</td>
			<td>{{ $denuncia->telefono }}</td>
			<td>{{ $denuncia->tipo_empresa }}</td>
			<td>{{ $denuncia->link_oferta }}</td>
			<td>{{ $denuncia->razon_social }}</td>
			<td>{{ $denuncia->nit }}</td>
			<td>{{ $denuncia->telefono_reportado }}</td>
			<td>{{ $denuncia->dir_compra }}</td> --}}
			<td>{{ $denuncia->dpto_hecho }}</td>
			<td>{{ $denuncia->lugar_especifico }}</td>
			<td>{{ $denuncia->nombre_reportado }}</td>
			<td>{{ $denuncia->decripcion_hecho }}</td>

			@if ($denuncia->archivo == "")
				{{-- <img src="{{ $denuncia->nombre }}"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario" > --}}
				<td>Sin archivo</td>
			@else
			<td>
				@if($extension=="jpg" || $extension == "jpeg" || $extension=="png" || $extension == "gif")
					<img src="{{ $denuncia->archivo }}"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario">
				@endif
				@if ($extension=="mp4" || $extension == "3gp" || $extension == "avi" || $extension == "wmv")
					<video width="320" height="240" controls src="{{ $denuncia->archivo }}"></video>
				@endif
				@if($extension=="mp3" || $extension == "wav" || $extension == "ogg")
					<audio src="{{ $denuncia->archivo }}" preload="none" controls></audio>
			@endif
			</td>
			@endif

			<td>
				<button type="button" class="btn btn-warning btn" onclick="verinfo_usuario({{  $denuncia->id }} , 20)" ><i class="fa fa-file-text"></i></button>
				<button type="button" class="btn btn-info btn" disabled><i class="fa fa-external-link"></i></button>
			</td>
		</tr>
	    @endforeach

		</tbody>
		</table>

	</div>
</div>




{{-- {{ $denuncias->links() }} --}}

@if(count($denuncias)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 


@endif

</div></section>
@endsection