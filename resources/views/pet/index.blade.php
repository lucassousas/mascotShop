@extends("templates.main")

@section("titulo", "Pets")

@section("formulario")
	<br />
	<h4>Cadastro de Pets</h4>
	<form action="/pet" method="POST" class="row">
		<div class="form-group col-5">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{ $pet->nome }}" />
		</div>
		<div class="form-group col-5">
			<label for="idade">Data de Nascimento: </label>
			<input type="calendar" name="idade" class="form-control" value="{{ $pet->idade }}" />
		</div>
		<div class="form-group col-5">
			<label for="dono">Nome do dono: </label>
			<input type="text" name="dono" class="form-control" value="{{ $pet->dono }}" />
		</div>
		<div class="form-group col-2">
			@csrf
			<input type="hidden" name="id" value="{{ $pet->id }}" />

			<a href="/pet" class="btn btn-primary"><i class="bi bi-plus-square"></i> Novo</a>
			<button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar</button>
		</div>
	</form>
@endsection