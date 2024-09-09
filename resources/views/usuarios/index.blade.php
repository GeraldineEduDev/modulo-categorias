@extends('layout')

@section('title')
	Usuarios | Listado
@stop()

@section('content')
	<h1 class="text-center">Usuarios</h1>
	<a href="{{ route('usuarios.create') }}" class="btn btn-success">Nuevo</a>
	@if (session('type'))
		<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
		  <strong>Mensaje</strong> {{ session('msn') }}
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		
	@endif()
	<table class="table">
		<thead>
			<th>
				Nombre
			</th>
			<th>
				Tipo Documento
			</th>
			<th>
				Documento
			</th>
			<th>
				Correo
			</th>
			<th>
				Telefono
			</th>
			<th>
				Dirección
			</th>
			<th>
				Sexo
			</th>
			<th>
				Rol
			</th>
			<th colspan="2">
				Acciones
			</th>
		</thead>
		@foreach($datos as $usuario)
			<tr>
				<td>
					{{ $usuario->nombre }}
				</td>
				<td>
					{{ $usuario->tipoDocumento }}
				</td>
				<td>
					{{ $usuario->documento }}
				</td>
				<td>
					{{ $usuario->email }}
				</td>
				<td>
					{{ $usuario->telefono }}
				</td>
				<td>
					{{ $usuario->direccion }}
				</td>
				<td>
					{{ $usuario->sexo }}
				</td>

				<td>
					{{ $usuario->rol->nombre }}
				</td>
				<td>
					<a href="{{route('usuarios.edit',$usuario->id)}}"><img src="{{url('img/editar.png')}}" width="30"></a>
				</td>
				<td>
					<a href="javascript:document.getElementById('delete-{{$usuario->id }}').submit()" onclick="return confirm('¿Realmente quiere eliminar el registro?')">
					<img src="{{url('img/eliminar.png')}}" height="30" >
					</a>
					<form id ="delete-{{$usuario->id}}" action="{{route('usuarios.destroy',$usuario->id)}}" method="POST">
					@method('delete')
					@csrf
					</form>
				</td>
			</tr>
		@endforeach()
	</table>
@stop()