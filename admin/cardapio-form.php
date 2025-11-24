<link rel="stylesheet" href="heisenburguer.css">

<div class="form-box">
    <h2>Cadastrar novo item</h2>

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
