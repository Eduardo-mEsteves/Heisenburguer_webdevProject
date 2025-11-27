<link rel="stylesheet" href="heisenburguer.css">

<?php
    require_once "config.inc.php";

    echo "<div class='cardapio-topo'>";

        echo "<p><a class='botao-add' href='?pg=cardapio-form'>Adicionar item ao cardapio</a></p>";
        echo "<h1>Cardápio</h1>";

    echo "</div>";
?>

<?php
    $sql = "SELECT * FROM receita";
    $resultado = mysqli_query($conexao, $sql);

    echo "<div class='container'>";
?>

<div class="item">
    <p>Cheeseburguer - Clássico da casa</p>
    <p>R$ 20.50</p>
    <blockquote>Hambúrguer clássico com pão carne e queijo</blockquote>
</div>

<div class="item">
    <p>Hamburgão azul - Clássico da casa</p>
    <p>R$ 29.50</p>
    <blockquote>Carne, queijo cheddar, bacon em tiras, alface, tomate e cebola crispy tingida de azul brilhoso</blockquote>
</div>

<?php
    while ($dados = mysqli_fetch_array($resultado)) {

        echo "<div class='item'>";

            echo "<p>". $dados['nome'] . "</p>";
            echo "<p>R$ " . $dados['preco'] . "</p>";

            echo "<blockquote>" . $dados['ingredientes'] . "</blockquote>";

            echo "<div class='acoes'>";
                echo "<a href='?pg=item-altera-form&id={$dados['id']}'>Editar</a>";
                echo " | ";
                echo "<a href='?pg=item-excluir&id={$dados['id']}'>Excluir</a>";
            echo "</div>";

        echo "</div>";
    }

    echo "</div>";