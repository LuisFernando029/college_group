<?php
$senha_original = "senha123";

$senha_hash = password_hash($senha_original, PASSWORD_DEFAULT);


if(password_verify($senha_original, $senha_hash)){
    echo "A senha digitada corresponde a senha criptografada";
}
else{
    echo "A senha digitada não corresponde a senha criptografada";
}
?>