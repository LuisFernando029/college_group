<?php
$url = 'https://jsonplaceholder.typicode.com/users';

$dados = file_get_contents($url);

$usuarios = json_decode($dados, true);

if($usuarios !== null){
    foreach ($usuarios as $user){
        echo "ID: " . $user['id'] . "<br>";
        echo "Nome: " . $user['name'] . "<br>";
        echo "E-mail: " . $user['email'] . "<br>";
        echo "<br>";
    }
}
else{
    echo "Erro ao decodificar JSON.";
}
?>