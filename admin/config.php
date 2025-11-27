<?php
// =======================================================
// CONFIGURAÇÃO GLOBAL E CONEXÃO COM O BANCO DE DADOS
// =======================================================

// 1. Iniciar sessão sempre (MANTIDO)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Conexão MySQLi (ADICIONADO - Padrão Admin)
$conexao = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conexao, "cardapioberg");

// =======================================================
// FUNÇÕES DE AUTENTICAÇÃO E SESSÃO (MANTIDAS)
// =======================================================

/**
 * Verifica se o cliente está logado.
 * Retorna true se houver 'cliente_id' na sessão.
 */
function cliente_logado() {
    return isset($_SESSION['cliente_id']);
}


/**
 * Exige que o cliente esteja logado para acessar a página.
 * Redireciona para a página de login caso não esteja logado.
 */
function exigir_login() {
    if (!cliente_logado()) {
        header("Location: ?pg=login"); 
        exit;
    }
}
?>