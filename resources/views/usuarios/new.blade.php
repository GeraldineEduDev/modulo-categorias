@extends('layout')

@section('title')
	Usuario | Registro
@stop()

@section('content')
	<h1 class="text-center">Registro de Usuarios</h1>
	<form action="{{ url('usuarios') }}" method="POST">
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
					<select name="tipoDocumento" class="form-control mb-3">
						<option value="">Seleccione tipo documento...</option>
						<option value="CC">CC</option>
						<option value="CE">CE</option>
						<option value="TI">TI</option>
						<option value="PA">PA</option>
						<option value="RC">RC</option>
					</select>
				</div>
				@error('tipoDocumento')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror()
			</div>
			<div class="row">
				<div class="col-md-4">
					<input type="text" name="documento" placeholder="Ingrese el documento" class="form-control mb-3" value="{{ old('descripcion') }}"></textarea>
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
					<a href="{{ url('usuarios') }}" class="btn btn-danger">Cancelar</a>
				</div>
			</div>
	</form>
@stop()