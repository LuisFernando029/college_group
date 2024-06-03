<?php
$id = $_GET['id'];
try{
    include 'conexao.php';
    $sql = $conexao->prepare("SELECT * FROM usuario WHERE id = '$id'");
    $sql->execute();
    if($sql->rowCount() == 1){
        if($user = $sql->Fetch()){
?>            
            <form action="#" method="post">
                Nome: <br><input type="text" name="_nome" value=<?php echo $user['nome'];?>><br>
                E-mail: <br><input type="text" name="_email" value=<?php echo $user['email'];?>><br>
                <input type="submit" value="Atualizar">
            </form>
<?php
        }
        $conexao = null;
    }
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
if($_POST){
    $nome = $_POST["_nome"];
    $email = $_POST["_email"];
    if(!empty($nome) && !empty($email)){
        try{
            require "conexao.php";
            $sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = '$id'";
            $conexao->exec($sql);
            echo "<script>alert('Cadastro Atualizado')</script>";
            $conexao = null;
            header('location:index.php');
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
?>