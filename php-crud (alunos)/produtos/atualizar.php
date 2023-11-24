<?php
    require_once "../src/funcoes-fabricantes.php";
    $listaDeFabricantes =lerFabricantes($conexao);

    require_once "../src/funcoes-produtos.php";

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $produto = lerUmProduto($conexao, $id);

    if(isset($_POST['atualizar'])){

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_SPECIAL_CHARS);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $fabricanteId = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_SPECIAL_CHARS);

        atualizarProduto($conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId);

        header("location:listar.php");

    }

    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>
</head>
<body>
    

<div class="container">

chi>Produtos | Select e Update</hi>

<hr>

<fore action="" method="POST">

<p>

<label for="none">Nomet</label>

<Input: value="<?=$produto['nome']?>" type="text" name="none" id="nose" required>

</p>

<p>

<label for="preco">Preço:</label>

<input value="<?=$produto['preco']?>" type="number" name="preco" id="preco" min="0" max="180000" step="8.01" required>

</p>

<label for="quantidade">Quantidade:</label>

<Input value="<?=$produto['quantidade']?>" type="number" name="quantidade" id="quantidade" min="0" max="100" required>

</p>

<label for="fabricante">Fabricante:</label>

<select name="fabricante" id="fabricante">

<option value=""></option>

<?php foreach($listaDeFabricantes as $fabricante) { ?>

<!-- Se a chave estrangeira for idêntica à chave primária

(ou seja, se o código do fabricante do produto bater com o código do fabricante), então coloque o atributo selected.

Obs: Isso serve para trazer o nome do fabricante selecionado quando usar a função "Atualizar".-->

<option

<?php if($produto['fabricante_id'] = $fabricante['id']) echo "selected";?>

value <?=$fabricante['id']?>> <!-- Para o banco --> <?=$fabricante['nome']?> <!-- Exibição no Front -->

</option>

<?php } ?>

</select>

</p>

<p>

<label for="descricao">descrição:</label><br>

<textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea> </p>

<button type="submit" name="atualizar">Atualizar produto</button>

</form>

</div>

<p><a href="listar.php">Woltar para lista de produtos</a></p>

<p><a href="../index.html">Home</a></p>
</body>
</html>