<link rel="stylesheet" href="heisenburguer.css">

<?php
    require "config.inc.php";

    echo "<p><a class='botao-add' href='?pg=cardapio-form'>Adicionar item ao cardapio</a></p>";
    echo "<h2>Cardápio</h2>";

    $sql = "SELECT * FROM receita";
    $resultado = mysqli_query($conexao, $sql);

    while ($dados = mysqli_fetch_array($resultado)) {

        echo "<div class='item'>";
            echo "<p><strong>Nome:</strong> " . $dados['nome'] . "</p>";
            echo "<p><strong>Preço:</strong> R$ " . $dados['preco'] . "</p>";

            echo "<blockquote>" . $dados['ingredientes'] . "</blockquote>";

            echo "<div class='acoes'>";
                echo "<a href='?pg=item-altera-form&id={$dados['id']}'>Editar</a>";
                echo " | ";
                echo "<a href='?pg=item-excluir&id={$dados['id']}'>Excluir</a>";
            echo "</div>";

        echo "</div>";
    }