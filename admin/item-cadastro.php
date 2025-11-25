<link rel="stylesheet" href="heisenburguer.css">

<?php
require_once "config.inc.php";

echo "<h1>Cadastrando seu item</h1>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $preco  = $_POST["preco"];
    $ingredientes  = $_POST["ingredientes"];

    if (!empty($nome) && !empty($preco) && !empty($ingredientes)) {

        $sql = "INSERT INTO receita (nome, preco, ingredientes)
                VALUES ('$nome', '$preco', '$ingredientes')";
        $inserir = mysqli_query($conexao, $sql);

        if ($inserir) {
            echo "<h2 class='sucesso-msg'>Seu item foi adicionado com sucesso!</h2>";
            echo "<img src='imagens/deserto.jpeg' class='imagem-alt'>";
            echo "<a class='botao-voltar' href='?pg=cardapio'>Voltar</a>";
        } else {
            echo "<h2>Erro ao cadastrar item.</h2>";
            echo mysqli_error($conexao);
        }

    } else {
        echo "<h2>Preencha todos os campos antes de enviar.</h2>";
        echo "<a class='botao-voltar' href='?pg=cardapio-form'>Voltar ao cadastro do item</a>";
    }

} else {
    echo "<h2>Envio de dados não permitido.</h2>";
    echo "<a class='botao-voltar' href='?pg=cardapio-form'>Voltar ao cadastro do item</a>";
}
?>