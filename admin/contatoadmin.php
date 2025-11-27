<link rel="stylesheet" href="heisenburguer.css">

<?php
require_once 'config.inc.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

exigir_login();

$mensagem = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $assunto = mysqli_real_escape_string($conexao, trim($_POST['assunto'] ?? ''));
    $texto   = mysqli_real_escape_string($conexao, trim($_POST['texto'] ?? ''));

    if (empty($assunto)) {
        $errors[] = 'O assunto é obrigatório.';
    }

    if (empty($texto)) {
        $errors[] = 'A mensagem não pode estar vazia.';
    }

    if (empty($errors)) {
        $registro  = "=================================\n";
        $registro .= "Data: " . date('Y-m-d H:i:s') . "\n";
        $registro .= "Cliente ID: " . ($_SESSION['cliente_id'] ?? '-') . "\n";
        $registro .= "Nome: " . ($_SESSION['cliente_nome'] ?? '-') . "\n";
        $registro .= "Assunto: $assunto\n";
        $registro .= "Mensagem:\n$texto\n\n";

        file_put_contents(
            'contatos_admin_log.txt',
            $registro,
            FILE_APPEND | LOCK_EX
        );

        $mensagem = "Sua mensagem foi entregue à gerência.";
    }
}
?>

<div class="cardapio-topo">
    <div style="text-align: right; margin-bottom: 20px; color: #E9FDEB;">
        <p>Cliente: <strong><?= htmlspecialchars($_SESSION['cliente_nome']) ?></strong></p>
        <a href="?pg=logout" style="color: #5EFF92; text-decoration: none; font-size: 14px;">[ Sair ]</a>
    </div>

    <h1>Falar com o Administrador</h1>
    <p class="frase-de-efeito" style="margin-top: 10px;">"Eu não estou em perigo, skyler. Eu sou o perigo."</p>
</div>

<?php if ($mensagem): ?>
    
    <div class="sucesso-msg">
        <h2><?= htmlspecialchars($mensagem) ?></h2>
    </div>
    <img src="imagens/assustado.jpeg" class="imagem-alt" style="display:block; margin: 0 auto; width: 40%;">

    <div style="text-align: center; margin-top: 30px;">
        <a href="?pg=comprar" class="botao-voltar">Voltar para Pedidos</a>
    </div>

<?php else: ?>

    <div class="form-box">
        <h2>Envie uma Mensagem Secreta</h2>

        <?php if (!empty($errors)): ?>
            <div style="background-color: #3b1010; border: 1px solid #ff5e5e; color: #ffadad; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="?pg=contatoadmin" method="post">
            
            <label>Assunto:</label>
            <input type="text" name="assunto" value="<?= htmlspecialchars($_POST['assunto'] ?? '') ?>" required>

            <label>Mensagem:</label>
            <textarea name="texto" rows="6" required><?= htmlspecialchars($_POST['texto'] ?? '') ?></textarea>

            <input type="submit" value="Enviar à Gerência">
        </form>
        
        <br>
        <div style="text-align: center;">
             <a href="?pg=comprar" class="botao-voltar">Voltar para o Cardápio</a>
        </div>
    </div>

<?php endif; ?>