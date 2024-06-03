<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    
<form action="" method="post" enctype="multipart/form-data">
    <h1>Selecione uma imagem para enviar: </h1>
    <input type="file" name="fl_upload" id="fileToUpload"><br><br>
    <input type="submit" value="Enviar Imagem" name="submit">
</form>

</body>
</html>

<?php 

if(isset($_POST['submit'])){
    $diretorio = "uploads/";
    $caminho = $diretorio . basename($_FILES["fl_upload"]["name"]);
    if(move_uploaded_file($_FILES["fl_upload"]["tmp_name"], $caminho)){
        echo "<br>O arquivo foi enviado com sucesso para " . $caminho;
?>
    <br><img src="<?php echo $caminho; ?>">
<?php
    }
    else{
        echo "<br>Desculpe, ocorreu um erro a enviar o arquivo.";
    }
}
?>