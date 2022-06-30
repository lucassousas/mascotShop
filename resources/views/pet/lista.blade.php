@extends("templates.main")

@section("titulo", "Listagem de Pets")

@section("tabela")
	<br/>
	<div class="row">
		<div class="col-10 form-group">
			<input type="text" name="q" class="form-control" placeholder="Buscar.." onkeyup="buscar($(this).val());" />
		</div>
		<div class="col-2 form-group">
			<a href="/pet/create" class="btn btn-primary">
				<i class="bi bi-plus-square"></i> Cadastrar Pet
			</a>
		</div>
	</div>
	<br/>
	<table id="tabPets" class="table table-striped">
		<colgroup>
			<col width="200">
			<col width="200">
			<col width="200">
			<col width="150">
			<col width="290">
			<col width="120">
		</colgroup>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Raça</th>
				<th>Sexo</th>
				<th>Idade</th>
				<th>Espécie</th>
				<th>Dono</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pets as $pet)
				<tr>
					<td class="td_nome">{{ $pet->nome }}</td>
					<td class="td_raca">{{ $pet->raca }}</td>
					<td class="td_sexo">{{ $pet->sexo }}</td>
					<td class="td_idade">{{ $pet->idade }}</td>
					<td class="td_especie">{{ $pet->especie }}</td>
					<td class="td_dono">{{ $pet->dono }}</td>
					<td>
						<a href="/pet/{{ $pet->id }}/edit" class="btn btn-warning">
							<i class="bi bi-pencil-square"></i>
							 Editar
						</a>
					</td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection	

<script>
	
	function buscar(q) {
		
		q = q.toLowerCase();
		
		$("#tabPets tbody tr").each(function() {
			
			var mostrar = true;
			
			var nome = $("td.td_nome", this).html();
			nome = nome.toLowerCase();
			
			var raca = $("td.td_raca", this).html();
			raca = raca.toLowerCase();

			var sexo = $("td.td_sexo", this).html();
			sexo = sexo.toLowerCase();
			
			var idade = $("td.td_idade", this).html();
			idade = idade.toLowerCase();

			var dono = $("td.td_dono", this).html();
			dono = dono.toLowerCase();

			var especie = $("td.td_dono", this).html();
			especie = especie.toLowerCase();

			mostrar = nome.includes(q) || raca.includes(q) || sexo.includes(q) || dono.includes(q) || idade.includes(q) || especie.includes(q);
			
			if (mostrar) {
				$(this).show();
			} else {
				$(this).hide();
			}
			
		});
		
	}
</script>