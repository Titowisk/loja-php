<?php 
include("cabecalho.php"); 
include("conecta.php");
include("banco-categoria.php");

?>

    <h1>Formulário</h1>
    <table class="table">
        <form action="adiciona-produto.php" method="post">
        <tr>
            <td>Nome:</td>
            <td><input class="form-control" type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Preco:</td>
            <td><input class="form-control" type="text" name="preco"></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea class="form-control" name="descricao"></textarea></td>
        </tr>
        <tr>
            <td>Usado:</td>
            <td><input type="checkbox" name="usado" value="true"></td>
        </tr>
        <tr>
            <td>Categorias:</td>
            <td>
                <select class="form-control" name="categoria_id">
                <?php foreach($categorias as $categoria) : ?>
                
                    <option value="<?=$categoria["id"]?>"><?=$categoria["nome"]?></option>
                
                <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="form-control" type="submit" value="Cadastrar"></td>
        </tr>
        </form>
    </table>
    

<?php include("rodape.php"); ?>
