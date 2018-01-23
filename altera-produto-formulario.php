<?php 
include("cabecalho.php"); 
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_GET["id"];

$produto = buscaProduto($conexao, $id);
$checked = ($produto["usado"]==true ? "checked" : "");
?>

    <h1>Alterar o Produto</h1>
    <table class="table">
        
        <form action="altera-produto.php" method="post">
            <input type="hidden" name="id" value="<?=$produto["id"]?>">
        <tr>
            <td>Nome:</td>
            <td><input class="form-control" type="text" name="nome" value="<?=$produto["nome"]?>"></td>
        </tr>
        <tr>
            <td>Preco:</td>
            <td><input class="form-control" type="text" name="preco" value="<?=$produto["preco"]?>"></td>
        </tr>
        <tr>
            <td>Descrição:</td>
            <td><textarea class="form-control" name="descricao"><?=$produto["descricao"]?></textarea></td>
        </tr>
        <tr>
            <td>Usado:</td>
            <td>
                <input type="checkbox" name="usado" value="<?=$produto["nome"]?>" <?=$checked?>>
            </td>
        </tr>
        <tr>
            <td>Categorias:</td>
            <td>
                <select class="form-control" name="categoria_id">
                <?php foreach($categorias as $categoria) : 
                    $categoriaPrevia = $produto["categoria_id"] == $categoria["id"];
                    $selected = ($categoriaPrevia ? "selected" : "");
                ?>
                
                    <option value="<?=$categoria["id"]?>" <?=$selected?>><?=$categoria["nome"]?></option>
                
                <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input class="form-control" type="submit" value="alterar"></td>
        </tr>
        </form>
    </table>
    

<?php include("rodape.php"); ?>
