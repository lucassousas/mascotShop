@extends("templates.main")

@section("titulo", "Espécies")

@section("formulario")
	<br />
	<h4>Cadastro de Espécie</h4>
	<form action="/especie" method="POST" class="row">
		<div class="form-group col-5">
			<label for="especie">Espécie: </label>
			<input type="text" name="especie" class="form-control" value="{{ $especie->especie }}" />
		</div>
		<div class="form-group col-5">
			<label for="raca">Raça: </label>
			<input type="text" name="raca" class="form-control" value="{{ $especie->raca }}" />
		</div>
		<div class="form-group col-5">
			<label for="definicao">Definição: </label>
			<input type="text" name="definicao" class="form-control" value="{{ $especie->definicao }}" />
		</div>
		<div class="form-group col-3">
			@csrf
			<input type="hidden" name="id" value="{{ $especie->id }}" />

			<a href="/especie" class="btn btn-primary" style="margin-top: 23px;"><i class="bi bi-plus-square"></i> Novo</a>
			<button type="submit" class="btn btn-success" style="margin-top: 23px;"><i class="bi bi-save"></i> Salvar</button>
		</div>
	</form>
@endsection

@section("tabela")
	<br />
	<h4>Espécies</h4>
	<div class="row" style="margin-top: 50px;">
		<div class="col-12 form-group">
			<input type="text" id="q" placeholder="Pesquisar por nome..." class="form-control" onkeyup="buscar($(this).val());" />
		</div>
	</div>
	<table id="tabEspecies" class="table table-striped" style="margin-top: 10px;">
		<colgroup>
			<col width="300">
			<col width="300">
			<col width="300">
		</colgroup>
		<thead>
			<tr>
				<th>Espécie</th>
				<th>Raça</th>
				<th>Definição</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($especies as $especie)
				<tr>
					<td class="td_especie">{{ $especie->especie }}</td>
					<td class="td_raca">{{ $especie->raca }}</td>
					<td class="td_definicao">{{ $especie->definicao }}</td>
					<td>
						<a href="/especie/{{ $especie->id }}/edit" class="btn btn-warning">
							<i class="bi bi-pencil-square"></i>
							 Edit
						</a>
					</td>
					<td>
						<form action="/especie/{{ $especie->id }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
								<i class="bi bi-trash"></i>
								Del
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

<script>
	
	function buscar(q) {
		
		q = q.toLowerCase();
		
		$("#tabEspecies tbody tr").each(function() {
			
			var mostrar = true;
			
			var especie = $("td.td_especie", this).html();
			especie = especie.toLowerCase();
			
			var raca = $("td.td_raca", this).html();
			raca = raca.toLowerCase();

			var definicao = $("td.td_definicao", this).html();
			definicao = definicao.toLowerCase();
			
			mostrar = especie.includes(q) || raca.includes(q) || definicao.includes(q);
			
			if (mostrar) {
				$(this).show();
			} else {
				$(this).hide();
			}
			
		});
		
	}
</script>