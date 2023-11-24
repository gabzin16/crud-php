<?php

    require_once "../src/funcoes-fabricantes.php";

    $Id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

    $fabricante = lerUmFabricante($conexao, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fabricante - atualizarProduto</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <?php

        if (isset($_POST['atualizar'])) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

           atualizarFabricante($conexao, $id, $nome);

            header("location:listar.php?");
        }
    ?>
    <form action="" method="POST">

    <input type="hidden" name="<?=$fabricante['id']?>">
    <p>
        <label for="nome">Nome:</label>
        <input value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome" >
    </p>
    <button type="submit" name="atualizar">Atualizar fabricante</button>

 </form>
    </div>
    <p><a href="listar.php">Voltar para a lista de fabricantes</a></p>
    <p><a href="../index.html"></a></p>
   
   </body>
</html>