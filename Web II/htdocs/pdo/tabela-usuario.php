<?php
require "conexao.php";
try{
    $sql = "CREATE TABLE IF NOT EXISTS usuario
    (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(45) NOT NULL,
        email VARCHAR(45) NOT NULL
    )";
    $conexao->exec($sql);
    echo "Tabela 'usuario' criada com Sucesso.<br>";
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>