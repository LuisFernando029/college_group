<?php 
if($_POST){
    $nome = $_POST["_nome"];
    $email = $_POST["_email"];
    if(!empty($nome) && !empty($email)){
        try {
            require "conexao.php";
            $sql = "INSERT INTO usuario (nome, email) VALUES ('$nome', '$email')";
            $conexao->exec($sql);
            $conexal = null;
            header('location:index.php');
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>