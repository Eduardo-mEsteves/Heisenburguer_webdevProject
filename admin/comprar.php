<link rel="stylesheet" href="heisenburguer.css">

<?php
require_once 'config.inc.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cliente_nome'])) {
    echo "<div class='form-box'>";
    echo "<h2>Acesso Negado</h2>";
    echo "<p>Você precisa se identificar antes de fazer negócios conosco.</p>";
    echo "<br><a href='?pg=login' class='botao-add'>Fazer Login</a>";
    echo "</div>";
    exit; 
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['produto_id'])) {
    $produto_id = intval($_POST['produto_id']);
    $nome_produto = $_POST['nome_produto']; 
    
    $mensagem = "Pedido realizado: $nome_produto (ID: $produto_id)";
}
?>

<div class="cardapio-topo">
    <div style="text-align: right; margin-bottom: 20px; color: #E9FDEB;">
        <p>Cliente: <strong><?= htmlspecialchars($_SESSION['cliente_nome']) ?></strong></p>
        <a href="?pg=logout" style="color: #5EFF92; text-decoration: none; font-size: 14px;">[ Sair ]</a>
    </div>

    <h1>Faça seu Pedido</h1>
    <p class="frase-de-efeito" style="margin-top: 10px;">"Say my name."</p>
</div>

<?php if ($mensagem): ?>
    <div class="sucesso-msg">
        <?= htmlspecialchars($mensagem) ?>
    </div>
    <img src="imagens/epico.jpeg" class="imagem-alt" style="display:block; margin: 0 auto; width: 40%;">
<?php endif; ?>

<?php
$sql = "SELECT * FROM receita";
$resultado = mysqli_query($conexao, $sql);

echo "<div class='container'>";

while ($dados = mysqli_fetch_array($resultado)) {
    echo "<div class='item'>";
        
        echo "<p><strong>" . $dados['nome'] . "</strong></p>";
        echo "<p>R$ " . $dados['preco'] . "</p>";
        
        echo "<blockquote>" . $dados['ingredientes'] . "</blockquote>";

        echo "<div style='margin-top: 15px; text-align: center;'>";
            echo "<form method='post'>";
                echo "<input type='hidden' name='produto_id' value='" . $dados['id'] . "'>";
                echo "<input type='hidden' name='nome_produto' value='" . $dados['nome'] . "'>";
          
                echo "<button type='submit' class='botao-add' style='cursor: pointer; background: #0F3F2A; width: 100%;'>Comprar</button>";
            echo "</form>";
        echo "</div>";

    echo "</div>";
}
echo "</div>";
?>

<br>
<div style="text-align: center; margin-top: 30px;">
    <a href="?pg=contatoadmin" class="botao-voltar">Falar com a gerência</a>
</div>