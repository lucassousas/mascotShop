@extends("templates.main")

@section("titulo", "Pets")

@section("formulario")
	<form method="POST" action="/pet" class="row">
		<div class="form-group col-5">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control" value="{{ $pet->nome }}" />
		</div>
		<div class="form-group col-5">
			<label for="dataNasc">Data de nascimento: </label>
			<input type="date" name="dataNasc" class="form-control" value="{{ $pet->dataNasc }}" required />
		</div>
		<div class="form-group col-5">
			<label for="sexo">Sexo: </label>
			<select class="form-control" name="sexo">
				<option value=""></option>
				<option value="macho">Macho</option>
				<option value="femea">Fêmea</option>
				<option value="indefinido">Indefinido</option>
			</select>
		</div>
		<div class="form-group col-5">
			<label for="dono">Nome do dono: </label>
			<input type="text" name="dono" class="form-control" value="{{ $pet->dono }}" />
		</div>
		<div class="col-6 form-group">
			<label for="especie">Espécie:</label>
			<select class="form-control selectpicker" name="especie_id" data-live-search="true">
				<option value=""></option>
				@foreach($especies as $especie)
					<option value="{{ $especie->id }}" @selected($pet->especie_id == $especie->id) >
						{{ $especie->especie }}
					</option>
				@endforeach
			</select>
		</div>
		<div class="col-6 form-group">
			@csrf
			<input type="hidden" name="id" value="{{ $pet->id }}" />
			
			<a href="/pet" class="btn btn-primary" style="margin-top: 23px;">
				<i class="bi bi-plus-square"></i>
				Novo
			</a>
			<button type="submit" class="btn btn-success" style="margin-top: 23px;">
				<i class="bi bi-save"></i>
				Salvar
			</button>
		</div>
	</form>
@endsection