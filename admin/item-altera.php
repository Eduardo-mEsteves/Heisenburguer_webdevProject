<link rel="stylesheet" href="heisenburguer.css">

<?php 
    require_once 'config.inc.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $ingredientes = $_POST['ingredientes'];

    $sql = "UPDATE receita SET nome = '$nome', preco = '$preco', ingredientes = '$ingredientes' WHERE id = '$id'";

    if($resultado = mysqli_query($conexao, $sql)){
        echo "<div class='sucesso-msg'><h2>Item alterado com sucesso!</h2></div>";
        echo "<img src='imagens/epico.jpeg' class='imagem-alt'>";
        echo "<a href='?pg=cardapio' class='botao-voltar'>Voltar</a>";
    } else {
        echo "<div class='sucesso-msg'><h2>Erro ao alterar item!</h2></div>";
        echo "<a href='?pg=cardapio' class='botao-voltar'>Voltar</a>";
    }
?>