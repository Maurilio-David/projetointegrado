<?php 
    //Abrir conexão (servidor, login, senha e nome do banco)
    $conecta = mysqli_connect("localhost", "root", "", "pi");

    //Testar conexao
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }
?>