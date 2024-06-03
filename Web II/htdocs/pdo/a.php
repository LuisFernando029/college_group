<?php
try{
    $conexao = new PDO("mysql:host=localhost;dbname=sistema",'root','');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
        echo "Erro de conexão: " . $e->getMessage();
        exit;
    }
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = $conexao->prepare("SELECT * FROM usuario");
    try {
        $sql->execute();
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array);
    }
    catch(PDOException $e){
        echo "Erro ao buscar usuário: " . $e->getMessage();
    }
}
$conexao = null;
?>