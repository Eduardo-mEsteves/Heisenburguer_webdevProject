<?php
// index.php

// =======================================================
// 1. CONFIGURAÇÃO E INCLUSÃO DE FUNÇÕES (CORREÇÃO DE ERRO)
// Este deve ser o primeiro código executável para definir cliente_logado()
// =======================================================
require_once 'config.inc.php'; 
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Heisenburguer - O Sabor É Nosso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="heisenburguer.css">
</head>
<body>

<div class="topo">
    <?php
    echo "<img src='imagens/logo.jpeg' class='logo'>";
    ?>

    <nav class="menu">
        <ul>
            <li><a href="index.php">Início</a></li>
            
            <?php if (cliente_logado()): ?>
                <li><a href="?pg=comprar">Fazer Pedido</a></li>
                <li><a href="?pg=contatoadmin">Falar com Admin</a></li>
                <li><a href="?pg=logout">Sair</a></li>
            <?php else: ?>
                <li><a href="?pg=cardapio">Cardápio (Gerenciar)</a></li>
                <li><a href="?pg=login">Login</a></li>
                <li><a href="?pg=cadastro">Cadastrar</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<main class="conteudo">

<?php
// =======================================================
// 3. LÓGICA DE ROTEAMENTO (SWITCH)
// =======================================================
if (isset($_GET['pg'])) {
    $pagina = $_GET['pg'];

    switch ($pagina) {
        
        // --- ROTAS DE ADMIN ORIGINAIS ---
        case 'cardapio':         require 'cardapio.php'; break;
        case 'cardapio-form':    require 'cardapio-form.php'; break;
        case 'item-cadastro':    require 'item-cadastro.php'; break;
        case 'item-altera-form': require 'item-altera-form.php'; break;
        case 'item-altera':      require 'item-altera.php'; break;
        case 'item-excluir':     require 'item-excluir.php'; break;

        // --- NOVAS ROTAS DO CLIENTE ---
        case 'login':            require 'login.php'; break;
        case 'cadastro':         require 'cadastro.php'; break;
        case 'comprar':          require 'comprar.php'; break;
        case 'contatoadmin':     require 'contatoadmin.php'; break;
        case 'logout':           require 'logout.php'; break;

        default:
            echo "<h2>Página não encontrada!</h2>";
            break;
    }
} else {
    // 4. CONTEÚDO DA PÁGINA INICIAL (QUANDO NÃO HÁ ROTA ESPECIFICADA)
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
        <p>Somos o Heinsenburger. Nossa filosofia é simples: sem meias medidas.

O Heinsenburger nasceu de uma ideia explosiva: juntar a atmosfera eletrizante de Albuquerque com o hambúrguer mais suculento que você vai provar. Deixamos o trailer de lado e montamos nosso "império" aqui, trazendo receitas que são verdadeiras bombas de sabor.
Combinamos a precisão científica na escolha dos ingredientes com a arte bruta de fazer um hambúrguer artesanal inesquecível. Aqui, a qualidade não é negociável e o sabor é a nossa única lei.</p>

        <div class="blocoA">
            <img src="imagens/epico.jpeg">
            <p>O Heinsenburger nasceu de uma obsessão simples: criar o produto mais puro e viciante da cidade. Nós acreditamos que fazer um hambúrguer perfeito não é apenas cozinhar, é uma ciência exata. Trocamos o trailer no deserto por uma chapa quente e aplicamos a mesma precisão química de Walter White para garantir que cada mordida tenha 99,1% de satisfação garantida. Se você quer qualidade questionável, vá a outro lugar. Se você quer o melhor, você está no lugar certo.</p>
        </div>

        <div class="blocoB">
            <img src="imagens/deserto.jpeg">
            <p>Até quem constrói um império precisa de uma pausa para o almoço.

Nós sabemos que a rotina pode ser pesada, seja negociando territórios ou apenas sobrevivendo à segunda-feira. Por isso, criamos um ambiente onde a única "pressão" é a do queijo derretendo sobre a carne. Nossos sócios e parceiros sabem: quando a fome bate, os negócios esperam. Aqui, o cliente é quem manda e o respeito pela receita é absoluto. Junte sua equipe, estacione o trailer (ou o carro) e venha provar o que realmente importa.  </p>
    </div>

        <div class="blocoB">
            <p>A Química do Sabor: Respeite a pureza dos ingredientes.

Esqueça o amadorismo. Nossa cozinha é o nosso laboratório. Cada ingrediente é selecionado com rigor científico, desde o blend de carnes até o nosso molho especial "Blue Sky" e os cristais de sabor que são nossa marca registrada. Não usamos atalhos nem misturas baratas. Nós "cozinhamos" com paixão para entregar um produto final cristalino, saboroso e inesquecível. Cuidado: o sabor é altamente viciante e pode causar vontade incontrolável de voltar amanhã.</p>
            <img src="imagens/hamburguer.jpeg">
        </div>

        <br>
        <h1>Aproveite os hamburgueres da Heisenburguer!</h1>
    </div>
<?php
}
?>

</main>

<footer>
    <p>&copy; 2025 Heisenburguer. Todos os direitos reservados.</p>
</footer>

</body>
</html>