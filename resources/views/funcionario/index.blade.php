@extends("templates.main")

@section("titulo", "Funcionários")

@section("formulario")
	<br />
	<h4>Cadastro de Funcionários</h4>
	<form action="/funcionario" method="POST" class="row">
		<div class="form-group col-5">
			<label for="nome">Funcionário: </label>
			<input type="text" name="nome" class="form-control" value="{{ $funcionario->nome }}" />
		</div>
		<div class="form-group col-5">
			<label for="cpf">CPF: </label>
			<input type="text" name="cpf" class="form-control" value="{{ $funcionario->cpf }}" />
		</div>
		<div class="form-group col-3">
			@csrf
			<input type="hidden" name="id" value="{{ $funcionario->id }}" />

			<a href="/funcionario" class="btn btn-primary" style="margin-top: 23px;">
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

@section("tabela")
	<br />
	<h4>Funcionários</h4>
	<div class="row" style="margin-top: 50px;">
		<div class="col-12 form-group">
			<input type="text" id="q" placeholder="Pesquisar por nome..." class="form-control" onkeyup="buscar($(this).val());" />
		</div>
	</div>
	<table id="tabFuncionarios" class="table table-striped" style="margin-top: 10px;">
		<colgroup>
			<col width="300">
			<col width="300">
			<col width="300">
		</colgroup>
		<thead>
			<tr>
				<th>Nome</th>
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
		
		$("#tabClientes tbody tr").each(function() {
			
			var mostrar = true;
			
			var nome = $("td.td_nome", this).html();
			nome = nome.toLowerCase();
			
			var cpf = $("td.td_cpf", this).cleanVal();
			
			mostrar = nome.includes(q) || cpf.includes(q);
			
			if (mostrar) {
				$(this).show();
			} else {
				$(this).hide();
			}
			
		});
		
	}
	
	function carregaDados() {
		$("#cpf").val($("#cpf_mask").cleanVal());
	}
	
	document.addEventListener("DOMContentLoaded", function() {
	
		$("#cpf_mask").mask("000.000.000-00", { "placeholder": "___.___.___-__" });
		
		$(".td_cpf").mask("000.000.000-00");
		
	});
</script>