<link rel="stylesheet" href="heisenburguer.css">

<?php
require_once 'config.inc.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($conexao, trim($_POST['email'] ?? ''));
    $senha = trim($_POST['senha'] ?? ''); // Senha bruta não é escapada, pois será verificada pelo hash

    if (empty($email) || empty($senha)) {
        $errors[] = 'Preencha todos os campos.';
    } else {

        $sql = "SELECT id, nome, email, senha FROM clientes WHERE email = '$email'";
        $resultado = mysqli_query($conexao, $sql);
        $clienteEncontrado = mysqli_fetch_assoc($resultado);

        if ($clienteEncontrado) {

            if (password_verify($senha, $clienteEncontrado['senha'])) {

                session_regenerate_id(true);

                $_SESSION['cliente_id']    = $clienteEncontrado['id'];
                $_SESSION['cliente_nome']  = $clienteEncontrado['nome'];
                $_SESSION['cliente_email'] = $clienteEncontrado['email'];

                header("Location: ?pg=comprar");
                exit;

            } else {
                $errors[] = 'Senha ou e-mail incorretos.';
            }

        } else {
            $errors[] = 'Senha ou e-mail incorretos.';
        }
    }
}
?>

<div class="cardapio-topo">
    <h1>Login do Cliente</h1>
    <p class="frase-de-efeito" style="margin-top: 10px;">Entre para cozinhar o império do sabor.</p>
</div>

<div class="form-box">
    <h2>Acesso Exclusivo</h2>

    <?php if (!empty($errors)): ?>
        <div style="background-color: #3b1010; border: 1px solid #ff5e5e; color: #ffadad; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul>
            <?php foreach($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="?pg=login" method="post">
        <label>E-mail:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="Entrar">
    </form>

    <br>
    <div style="text-align: center;">
        <a href="?pg=cadastro" class="botao-voltar" style="background-color: #0F3F2A;">Não tem conta? Cadastre-se</a>
    </div>
</div>