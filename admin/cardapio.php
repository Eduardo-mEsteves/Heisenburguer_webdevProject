<?php

    require "config.inc.php";

    echo "<p><a href='?pg=cardapio-form'>Adicionar item ao cardapio</a></p>";
    echo "<h2>Cardápio</h2>";

    $sql = "SELECT * FROM receita";
    $resultado = mysqli_query($conexao, $sql);

    while ($dados = mysqli_fetch_array($resultado)) {
    echo "<div>";
        echo "<p><span>Nome:</span> <strong>" . $dados['nome'] . "</strong></p>";
        echo "<p><span>Preço:</span> " . $dados['preco'] . "</p>";
        echo "<blockquote>\"" . $dados['ingredientes'] . "\"</blockquote>";

        echo "<div>";
            echo "<a href='?pg=item-altera-form&id={$dados['id']}'>Editar</a> <br>";
            echo "<a href='?pg=item-excluir&id={$dados['id']}'>Excluir</a>";
        echo "</div>";
    echo "</div>";
    }
