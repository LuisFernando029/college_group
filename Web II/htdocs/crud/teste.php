<?php 
    $curso = array(
        array("nome" => "Administração", "periodo" => "Matutino"),
        array("nome" => "Marketing", "periodo" => "Matutino"),
        array("nome" => "Desing Grafico", "periodo" => "Vespertino"),
        array("nome" => "Informática", "periodo" => "Vespertino"),
        array("nome" => "Gestão de Projeto", "periodo" => "Noturno"),
        array("nome" => "Recursos humanos", "periodo" => "Noturno"),
    );

?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabela</title>
    <style>
        header{
            display: flex;
            flex-direction: row;
            align-items: center;
            height: 100px
            padding: px;
            gap: 10px;
        }
    </style>
</head>
<body> 
    <header>
    <h1><?php echo "Curso" ?></h1>
    <button type="button" class="btn btn-success btn-sm">Adicionar</button>
</header>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Periodo</th>
                <th scope="col">Ações</th>
                
             </tr>
        </thead>
       
        <tbody>
            
            <?php
                 foreach ($curso as $c) {
                    
            ?>    
                <tr>
                    <td><?php echo $c['nome'];?></td>
                    <td><?php echo $c['periodo'];?></td>
                    <td><button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Excluir</button></td>
                    
                </tr>    
            <?php
                 } 
            ?>
        </tbody>
     </table>
        

</body>
</html>