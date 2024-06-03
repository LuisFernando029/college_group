<?php
$id = $_GET['id'];
try{
    require 'conexao.php';
    $sql = "DELETE FROM usuario WHERE id = '$id'";
    $conexao->exec($sql);
    header('location:index.php'); 
    $conexao = null;
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>