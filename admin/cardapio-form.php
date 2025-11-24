<link rel="stylesheet" href="heisenburguer.css">

<div>
    <h2>Cadastrar novo item</h2>

    <form action="?pg=item-cadastro" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br>

        <label for="ingredientes">O que leva:</label><br>
        <textarea name="ingredientes" rows="5" required></textarea><br>

        <input type="submit" value="Postar">
    </form>
</div>