<?php

function dao($sql){
    //Conecta no banco de dados
    $conn = mysqli_connect("127.0.0.1", "root", "12345", "lomops");

    //Define o padrão de caracteres que irão para o banco de dados (acentuação)
    mysqli_set_charset($conn,"utf8");

    //Mostra a linha do SQL
    var_dump($sql);

    //Busca os dados do banco de dados
    $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

    mysqli_free_result($result);
    //fecha conexão com o banco de dados
    mysqli_close($conn);

    //Return os dados
    return $result;
}