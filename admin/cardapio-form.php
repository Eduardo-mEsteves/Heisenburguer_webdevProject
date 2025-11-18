<div>
    <h2>Fazer novo post</h2>

    <form action="?pg=item-cadastro" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required>

        <label for="ingredientes">O que leva:</label>
        <textarea name="ingredientes" rows="5" required></textarea>

        <input type="submit" value="Postar">
    </form>
</div>