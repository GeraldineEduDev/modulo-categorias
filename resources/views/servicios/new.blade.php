@extends('layout')

@section('title')
	Servicio | Registro
@stop()

@section('content')
	<h1 class="text-center">Registro de Servicios</h1>
	<form action="{{ url('servicios') }}" method="POST">
		@csrf
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="nombre" placeholder="Ingrese el nombre" class="form-control mb-3" value="{{ old('nombre') }}">
				</div>
				@error('nombre')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<textarea name="descripcion" placeholder="Ingrese la descripción" class="form-control mb-3" value="{{ old('descripcion') }}"></textarea>
				</div>
				@error('descripcion')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<select name="categoria_id" class="form-control mb-3">
						<option value="">Seleccione categoría...</option>
						@foreach($datos as $categoria)
							<option value="{{ $categoria->id}}">{{ $categoria->nombreCategoria}}</option>
						@endforeach
					</select>
				</div>
				@error('categoria_id')
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