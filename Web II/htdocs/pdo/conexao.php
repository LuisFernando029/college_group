<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conexao = new PDO("mysql:host = $servername", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Localhost Conectado.<br>";
    $sql = "CREATE DATABASE IF NOT EXISTS sistema";
        $conexao->exec($sql);
        echo "Banco de Dados Criado.<br><br>";
        $conexao->exec("USE sistema");
}
catch(PDOException $e){
    echo "Falha na Conexão: " . $e->getMessage();
}
?>