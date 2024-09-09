@extends('layout')

@section('title')
	Servicios | Registro
@stop()

@section('content')
	<h1 class="text-center">Editar Servicios</h1>
	<form action="{{ route('servicios.update',$datos->id) }}" method="POST">
		@method('PUT')
        @csrf
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="nombre" placeholder="Ingrese el nombre" class="form-control mb-3" value="{{ old('nombre',$datos->nombre) }}">
				</div>
				@error('nombre')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<textarea name="descripcion" class="form-control mb-3">{{ old('descripcion',$datos->descripcion) }}</textarea>
				</div>
				@error('descripcion')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<select name="categoria_id" class="form-control mb-3">
						@foreach($datos1 as $categoria)
							@if($categoria->id == $datos->categoria_id)
								<option value="{{ $categoria->id}}">{{ $categoria->nombreCategoria}}</option>
							@else
								<option value="{{ $categoria->id }}">{{ $categoria->nombreCategoria }}</option>
							@endif
						@endforeach
					</select>
				</div>
				@error('nombre')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<button class="btn btn-success">Enviar</button>
					<a href="{{ url('servicios') }}" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
	</form>
@stop()