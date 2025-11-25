<link rel="stylesheet" href="heisenburguer.css"> 

<div class="topo">
    <?php
    echo "<img src='imagens/logo.jpeg' class='logo'>";
    ?>

    <nav class="menu">
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="?pg=cardapio">Cardápio</a></li>
        </ul>
    </nav>
</div>

<br>

<?php
if (!isset($_GET['pg']) || $_GET['pg'] == 'inicio') {
?>
    <div class="frase-de-efeito">
        <h1>"Eu não quero hamburguer, skyler..."</h1>
        <img src="imagens/sentados.jpeg" class="imagem1" alt="Sentados">
        <div class="direita">
            <h1>"...eu sou o hamburguer"</h1>
        </div>
    </div>

    <div class="quem-somos">
        <h1>Quem nós somos?</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dignissimos obcaecati molestias similique est quam pariatur incidunt, dolores accusamus doloremque eius id dicta, optio repellat rem rerum deleniti debitis adipisci! Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus minus reiciendis consectetur omnis delectus pariatur harum nostrum id, unde aliquid, in doloremque tempore voluptate fuga, recusandae beatae iure corrupti vitae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere molestiae cupiditate inventore ab odio! Eos nam voluptas ipsum provident atque commodi. Ab aperiam quis illo a molestiae dicta aspernatur blanditiis.</p>

        <div class="blocoA">
            <img src="imagens/epico.jpeg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, facilis repellat, ab earum doloribus modi necessitatibus delectus laboriosam, nostrum omnis maxime maiores tenetur consequuntur iure nobis pariatur at magni quo.</p>
        </div>

        <div class="blocoB">
            <img src="imagens/deserto.jpeg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, facilis repellat, ab earum doloribus modi necessitatibus delectus laboriosam, nostrum omnis maxime maiores tenetur consequuntur iure nobis pariatur at magni quo.</p>
        </div>

        <div class="blocoB">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, facilis repellat, ab earum doloribus modi necessitatibus delectus laboriosam, nostrum omnis maxime maiores tenetur consequuntur iure nobis pariatur at magni quo.</p>
            <img src="imagens/hamburguer.jpeg">
        </div>

        <br>
        <h1>Aproveite os hamburgueres da Heisenburguer!</h1>
    </div>
<?php
}
?>

<?php
if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];

    switch ($pagina) {
        case 'cardapio':
            require 'cardapio.php';
            break;

        case 'cardapio-form':
            require 'cardapio-form.php';
            break;

        case 'item-cadastro':
            require 'item-cadastro.php';
            break;

        case 'item-altera':
            require 'item-altera.php';
            break;

        case 'item-altera-form':
            require 'item-altera-form.php';
            break;

        case 'item-excluir':
            require 'item-excluir.php';
            break;

        default:
            echo "<h2>Página não encontrada!</h2>";
            break;
    }
} 
?>
