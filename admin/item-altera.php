<?php 
    require_once 'config.inc.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $ingredientes = $_POST['ingredientes'];

    $sql = "UPDATE receita SET nome = '$nome', preco = '$preco', ingredientes = '$ingredientes' WHERE id = '$id'";

    if($resultado = mysqli_query($conexao, $sql)){
        echo "<br><h2>Post alterado com sucesso!</h2><br>";
        echo "<a href='?pg=cardapio'>Voltar</a>";
    } else {
        echo "<br><h2>Erro ao alterar item!</h2><br>";
        echo "<a href='?pg=cardapio'>Voltar</a>";
    }       