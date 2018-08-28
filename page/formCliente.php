<?php
	require "controller/cliente.php";
?>

<form action="#" method="post">
	<input type="hidden" name="acao" value="salvar">
		
	<div class="form-group">
		<label for="">Nome</label>
		<input type="text" name="nome" require>
	</div>

	<div class="form-group">
		<label for="">E-mail</label>
		<input type="email" name="email">
	</div>
	
	<div class="form-group">
		<label for="">Senha</label>
		<input type="password" name="pws1">
	</div>

	<div class="form-group">
		<label for="">Confirme Senha</label>
		<input type="password" name="pws2">
	</div>

	<div class="form-group">
		<label for="">CEP</label>
		<input type="text" name="cep" maxlength="9" onblur="pesquisacep(this.value)" id="cep">
	</div>

	<div class="form-group">
		<label for="">Endereço</label>
		<input type="text" name="logradouro" id="logradouro">
	</div>

	<div class="form-group">
		<label for="">Bairro</label>
		<input type="text" name="bairro" id="bairro">
	</div>

	<div class="form-group">
		<label for="">Cidade</label>
		<input type="text" name="cidade" id="cidade">
	</div>

	<div class="form-group">
		<label for="">Estado</label>
		<input type="text" name="uf" maxlength="2" id="uf">
	</div>

	<div class="form-group">
		<button> Salvar </button>
		<button type="reset"> Cancelar </button>
	</div>

</form>
<script src="js/ceps.js"></script>
