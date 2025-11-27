<link rel="stylesheet" href="heisenburguer.css">

<?php
    require_once "config.inc.php";

    $id = $_REQUEST["id"];

    $sql = "SELECT * FROM receita WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($dados = mysqli_fetch_array($resultado)){
            $nome = $dados["nome"];
            $preco = $dados["preco"];
            $ingredientes = $dados["ingredientes"];
            $id = $dados["id"];
        }
?>

<div class="form-box">
    <h2>Alteração de dados do item</h2>

    <form action="?pg=item-altera" method="post">
        <input type="hidden" name="id" value="<?=$id?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?=$nome?>" required>

        <label>Preço:</label>
        <input type="text" name="preco" value="<?=$preco?>" required>

        <label>Ingredientes:</label>
        <textarea name="ingredientes" required><?=$ingredientes?></textarea>

        <input type="submit" value="Cadastrar">
    </form>
</div>

<?php
}else{
    echo "<div class='sucesso-msg'><h2>Nenhum ingrediente encontrado</h2></div>";
}
?>