@extends('layout')

@section('title')
	Servicios | Listado
@stop()

@section('content')
	<h1 class="text-center">Servicios</h1>
	<a href="{{ route('servicios.create') }}" class="btn btn-success">Nuevo</a>
	@if (session('type'))
		<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
		  <strong>Mensaje</strong> {{ session('msn') }}
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		
	@endif()
	<table class="table">
		<thead>
			<th>
				Nombre Servicio
			</th>
			<th>
				Descripción
			</th>
			<th>
				Categoría
			</th>
			<th colspan="2">
				Acciones
			</th>
		</thead>
		@foreach($datos as $servicio)
			<tr>
				<td>
					{{ $servicio->nombre }}
				</td>
				<td>
					{{ $servicio->descripcion }}
				</td>
				<td>
					{{ $servicio->categoria->nombreCategoria }}
				</td>
				<td>
					<a href="{{route('servicios.edit',$servicio->id)}}"><img src="{{url('img/editar.png')}}" width="30"></a>
				</td>
				<td>
					<a href="javascript:document.getElementById('delete-{{$servicio->id }}').submit()" onclick="return confirm('¿Realmente quiere eliminar el registro?')">
					<img src="{{url('img/eliminar.png')}}" height="30" >
					</a>
					<form id ="delete-{{$servicio->id}}" action="{{route('servicios.destroy',$servicio->id)}}" method="POST">
					@method('delete')
					@csrf
					</form>
				</td>
			</tr>
		@endforeach()
	</table>
@stop()