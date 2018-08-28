<?php
//importações
require_once "page/mensagem.php";
require_once "upload.php";

//Verifica se o conteudo do $_POST['nome'] existe
if (isset($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if ($acao == "salvar") {
        //Pega os dados do cliente sem filtros
        $cliente = $_POST;
        $cliente['foto'] = $_FILES['foto'];
        //Chama a função para salar no banco de dados
        salvar($cliente);
    }

    if ($acao == "listar") {
        $cliente = listar($_POST['dados']);
    }

    if ($acao == "logar") {
        login($_POST['email'], $_POST['pws']);
    }

    if ($acao == "logoff") {
        logoff();
    }
}

//Funções -----------------------------------------------
function salvar($cliente)
{
    //valida os dados do cliente
    $e = validar($cliente);

    if ($e == "") {
        //Envia a foto para a pasta clientes em img
        $foto = up('img/clientes/', $cliente['foto']);
        if ($foto) {
            //Conecta no banco de dados
            $link = mysqli_connect(LOCAL, USER, PASS, BANCO);

            //Define o padrão de caracteres que irão para o banco de dados (acentuação)
            mysqli_set_charset($link, "utf8");

            $sql = htmlspecialchars("insert into endereco(cep, logradouro, cidade, bairro, uf) values ('"
                . trim($cliente['cep']) . "','"
                . trim(addslashes($cliente['logradouro'])) . "','"
                . trim(addslashes($cliente['cidade'])) . "','"
                . trim(addslashes($cliente['bairro'])) . "','"
                . trim($cliente['uf']) . "'); ");

            //Salva o endereço no banco de dados
            $salvar = mysqli_query($link, $sql);

            //Decompoem a data em vetor e montar a data no formato do banco
            $data = explode("/", trim(addslashes($cliente['data_nasc'])));
            $data = "$data[2]-$data[1]-$data[0]";

            //Define um novo SQL para o cadastro do cliente
            $sql = htmlspecialchars("insert into cliente(nome, email, foto, data_nasc, cep, pws) values ('"
                . trim(addslashes($cliente['nome'])) . "','"
                . trim(addslashes($cliente['email'])) . "','"
                . $foto . "','"
                . $data . "','"
                . trim($cliente['cep']) . "','"
                . crypt(trim($cliente['email']), trim($cliente['pws1'])) . "'); ");

            //Salva o endereço no banco de dados
            $salvar = mysqli_query($link, $sql);

            //Verifica se cliente foi salva
            if ($salvar) {
                aviso("Cadastrado");
            } else {
                //printf("Error: ", mysqli_error($link));
                erro("Não cadastrado");
            }

            //Fecha a conexão com o anco de dados
            mysqli_close($link);
        }
    } else {
        //Mostra os erros da validação
        erro($e);
    }
}

function validar($c)
{ // $c = $cliente
    $erros = "";
    if ($c['nome'] == "") {
        $erros .= "Nome em branco.</br>";
    }

    if ($c['email'] == "") {
        $erros .= "E-mail em branco.</br>";
    }

    if ($c['pws1'] == "") {
        $erros .= "Senha em branco.</br>";
    } elseif ($c['pws1'] !== $c['pws2']) {
        $erros .= "Senhas diferentes.</br>";
    }
    return $erros;
}

function listar($dados)
{
    $dados = $dados . '%';
    //Conecta no banco de dados
    $link = mysqli_connect(LOCAL, USER, PASS, BANCO);

    //Define o padrão de caracteres que irão para o banco de dados (acentuação)
    mysqli_set_charset($link, "utf8");

    //Define o SQL para a busca dos dados
    $sql = "SELECT *
            FROM cliente, endereco
            WHERE cliente.cep = endereco.cep
            and cliente.nome like '$dados'";

    //Busca os dados do cliente no banco de dados
    $result = mysqli_query($link, $sql);

    //Verifica se existem dados do cliente
    if (!$result) {
        printf("Error: ", mysqli_error($link));
        alerta("Não localizado");
    }

    //Fecha a conexão com o anco de dados
    mysqli_close($link);

    //Retorna o resultado encontrado
    return $result;
}

function login($email, $pws)
{
    $pws = crypt($email, $pws);
    $link = mysqli_connect(LOCAL, USER, PASS, BANCO);
    mysqli_set_charset($link, "utf8");

    $sql = "select id, nome
            from cliente
            where
                email = '$email'
            and
                pws = '$pws'";

    $result = mysqli_query($link, $sql);
    //Se o resultdo for igual a 1
    if (mysqli_num_rows($result) == 1) {
        //Inicia o uso de session
        session_start();
        //Cria uma session de nome cliente
        $_SESSION['cliente'] = mysqli_fetch_row($result);
        header("Location: index.php");
    } else {
        //printf("Error: ", mysqli_error($link));
        alerta("Não localizado");
    }
    //libera os resutados da variavel
    mysqli_free_result($result);
    //desconecta
    mysqli_close($link);
}

function logoff()
{
    session_start();
    session_destroy();
    header("Location: index.php");
}
