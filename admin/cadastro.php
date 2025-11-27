<link rel="stylesheet" href="heisenburguer.css">

<?php
require_once "config.inc.php";

$sucesso = false;
$erro_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = mysqli_real_escape_string($conexao, trim($_POST['nome'] ?? ''));
    $email    = mysqli_real_escape_string($conexao, trim($_POST['email'] ?? ''));
    $senha    = $_POST['senha'] ?? '';
    $senha2   = $_POST['senha2'] ?? '';
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone'] ?? ''));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco'] ?? ''));

    if (empty($nome)) {
        $erro_msg = "Nome é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro_msg = "E-mail inválido.";
    } elseif (strlen($senha) < 6) {
        $erro_msg = "A senha precisa de pelo menos 6 caracteres.";
    } elseif ($senha !== $senha2) {
        $erro_msg = "As senhas não coincidem.";
    } else {
        $sql_check = "SELECT id FROM clientes WHERE email = '$email'";
        $resultado_check = mysqli_query($conexao, $sql_check);

        if (mysqli_num_rows($resultado_check) > 0) {
            $erro_msg = "Este e-mail já está cadastrado.";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO clientes (nome, email, senha, telefone, endereco) 
                    VALUES ('$nome', '$email', '$senha_hash', '$telefone', '$endereco')";
            
            if (mysqli_query($conexao, $sql)) {
                $sucesso = true;
            } else {
                $erro_msg = "Erro ao cadastrar no banco de dados: " . mysqli_error($conexao);
            }
        }
    }
}
?>

<?php if ($sucesso): ?>

    <div class="sucesso-msg">
        <h2>Cadastro realizado com sucesso!</h2>
    </div>
    
    <img src="imagens/epico.jpeg" class="imagem-alt">
    
    <br><br>
    
    <div style="text-align: center;">
        <p style="color: #E9FDEB; font-size: 18px;">Agora você faz parte do império.</p>
        <br>
        <a href="?pg=login" class="botao-add">Clique aqui para entrar</a>
    </div>

<?php else: ?>

    <div class="form-box">
        <h2>Cadastro de Cliente</h2>

        <?php if (!empty($erro_msg)): ?>
            <div style="background-color: #3b1010; border: 1px solid #ff5e5e; color: #ffadad; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <?= $erro_msg ?>
            </div>
        <?php endif; ?>

        <form action="?pg=cadastro" method="post">
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required>

            <label>E-mail:</label>
            <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

            <label>Senha:</label>
            <input type="text" name="senha" required> <label>Confirmar senha:</label>
            <input type="text" name="senha2" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>">

            <label>Endereço:</label>
            <textarea name="endereco" rows="3"><?= htmlspecialchars($_POST['endereco'] ?? '') ?></textarea>

            <input type="submit" value="Cadastrar">
        </form>

        <br>
        <div style="text-align: center;">
            <a href="?pg=login" class="botao-voltar">Já tem conta? Entrar</a>
        </div>
    </div>

<?php endif; ?>