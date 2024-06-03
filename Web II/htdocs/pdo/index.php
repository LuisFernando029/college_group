<?php
require 'conexao.php';
require 'tabela-usuario.php';
$conexao = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Novo Usuário</h1>
    <form action="insert.php" method="post">
        Nome: <input type="text" name="_nome"><br><br>
        E-mail: <input type="email" name="_email"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
<br>
<?php
    require 'select.php'
?>
</body>
</html>