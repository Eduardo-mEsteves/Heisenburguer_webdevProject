<?php

    require_once 'config.inc.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM receita WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<br><h2>Item excluído com sucesso.</h2>";
        echo "<a href='?pg=cardapio'>Voltar</a>";
    }else{
        echo "<br><h2>Erro ao excluir item.</h2>";
        echo "<a href='?pg=cardapio'>Voltar</a>";
    }