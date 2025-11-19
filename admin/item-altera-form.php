<?php
    require "config.inc.php";


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
<div>
    <h2>Alteração de dados do cliente</h2>
    <form action="?pg=post-altera" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?=$nome?>" required><br>

        <label>Preço:</label>
        <input type="text" name="preco" value="<?=$preco?>" required><br>
        
        <label>ingredientes:</label>
        <textarea name="ingredientes" required value="<?=$ingredientes?>"></textarea><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</div>
<?php
}else{
        echo "<br><h2>Nenhum ingrediente encontrado</h2>";
    }
?>