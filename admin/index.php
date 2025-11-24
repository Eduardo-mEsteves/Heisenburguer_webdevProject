
<link rel="stylesheet" href="heisenburguer.css"> 
   
<div>
    <?php
    echo "<h1>HEISENBURGUER</h1>";
    ?>

    <nav class="menu">
    <ul>
        <li><a href="index.php">Início</a></li>
        <li><a href="?pg=cardapio">Cardápio</a></li>
    </ul>
    </nav>
</div>

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
</body>
</html>
