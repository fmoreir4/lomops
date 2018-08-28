<?php
	require "controller/cliente.php";
?>

<form action="#" method="post" enctype="multipart/form-data">
	<input type="hidden" name="acao" value="salvar">

	<div class="form-group">
		<label for="">Foto perfil</label>
		<input type="file" name="foto" class="form-control" require>
	</div>

	<div class="form-group">
		<label for="">Nome</label>
		<input type="text" name="nome" class="form-control" require>
	</div>

	<div class="form-group">
		<label for="">E-mail</label>
		<input type="email" name="email" class="form-control" >
	</div>

    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="data_nasc" placeholder="dd/mm/aaaa" id="datepicker">
    </div>

	<div class="form-group">
		<label for="">Senha</label>
		<input type="password" name="pws1" class="form-control" >
	</div>

	<div class="form-group">
		<label for="">Confirme Senha</label>
		<input type="password" name="pws2" class="form-control" >
	</div>

	<div class="form-group">
		<label for="">CEP</label>
		<input type="text" name="cep" maxlength="9" onblur="pesquisacep(this.value)" id="cep" class="form-control" >
	</div>

	<div class="form-group">
		<label for="">Endereço</label>
		<input type="text" name="logradouro" class="form-control" id="logradouro">
	</div>

	<div class="form-group">
		<label for="">Bairro</label>
		<input type="text" name="bairro" class="form-control" id="bairro">
	</div>

	<div class="form-group">
		<label for="">Cidade</label>
		<input type="text" name="cidade" class="form-control" id="cidade">
	</div>

	<div class="form-group">
		<label for="">Estado</label>
		<input type="text" name="uf" maxlength="2" class="form-control" id="uf">
	</div>

	<div class="form-group text-right">
		<button class="btn "> Salvar </button>
		<button class="btn " type="reset"> Cancelar </button>
	</div>

</form>
<script src="js/ceps.js"></script>
