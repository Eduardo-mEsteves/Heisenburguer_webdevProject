<link rel="stylesheet" href="heisenburguer.css">

<?php

require_once 'config.inc.php';

$id = $_GET['id'];
$sql = "DELETE FROM receita WHERE id = '$id'";

if(mysqli_query($conexao, $sql)){
    echo "<div class='sucesso-msg'><h2>Item excluído com sucesso.</h2></div>";
    echo "<a href='?pg=cardapio' class='botao-voltar'>Voltar</a>";
}else{
    echo "<div class='sucesso-msg'><h2>Erro ao excluir item.</h2></div>";
    echo "<a href='?pg=cardapio' class='botao-voltar'>Voltar</a>";
}

?>