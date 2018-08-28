<?php
	require("controller/cliente.php");
?>

<form method="post" action="#">
<div class="form-row">
    <div class="col-2">
        <label for="" class="">Pesquisar</label>
    </div>
    <div class="col-8">
        <input type="text" name="dados" class="form-control">
        <input type="hidden" name="acao" value="listar">
    </div>
    <div class="col-2">
        <button class="btn btn-primary mb-2">OK</button>
    </div>
</div>
</form>
<table class="table">
    <tr>
        <th>ID</th> <th> Nome </th> <th> E-mail </th> <th> CEP </th>
    </tr>
<?php
    if (isset($cliente)){
        foreach($cliente as $c){
            echo "<tr> 
                <td> $c[id] </td>
                <td> $c[nome]</td>
                <td>$c[email]</td>
                <td>$c[cep]</td>
            </tr>";
        }
    }
?>
</table>