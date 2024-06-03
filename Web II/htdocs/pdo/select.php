<?php 
    require "conexao.php";
    $sql = $conexao->prepare("SELECT id, nome, email FROM usuario");
    $sql->execute();
    $array_usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
    if($array_usuarios) {
        foreach ($array_usuarios as $user) {
            echo "<hr>";
            echo "ID: " . $user['id'] . "<br>";
            echo "Nome: " . $user['nome'] . "<br>";
            echo "E-mail: " . $user['email'] . "<br>";
?>
    <a href='update.php?id=<?php echo$user['id']; ?>'>Editar</a>
   | <a href='delete.php?id=<?php echo$user['id']; ?>'>Excluir</a>
<?php
    echo "<br><br>";
    }
}
?>