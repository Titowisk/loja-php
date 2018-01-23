<?php 
include("cabecalho.php"); 
include("conecta.php");
include("banco-produto.php");
?>

<?php

if(array_key_exists("remove", $_GET) && $_GET["remove"]==true){?>    
    <p class="alert-success">Produto removido com sucesso</p>
<?php
}
?>

<table class="table table-striped table-bordered">

    <tr>
        <td><strong>Nome do Produto:</strong></td>
        <td><strong>Preço:</strong></td>
        <td><strong>Descrição:</strong></td>
        <td><strong>Categoria:</strong></td>
        <td><strong>Usado:</strong></td>
    </tr>
    <?php 
        
        $produtos = listaProdutos($conexao);
        foreach($produtos as $produto) :
    ?>
    <tr>
        <td><?=$produto["nome"]?></td>
        <td>R$ <?=$produto["preco"]?></td>
        <td><?=substr($produto["descricao"], 0, 45)?>...</td>
        <td><?=$produto["categoria_nome"]?></td>
        <td>
            <?php if($produto["usado"]==1) : ?>
                Usado
             <?php else: ?>
                Novo
            <?php endif ?>
        </td>
        <td>
            <a class="btn btn-primary" href="altera-produto-formulario.php?id=<?=$produto["id"]?>">Alterar</a>
        </td>
        <td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto["id"]?>">
                <button type="submit" class="btn btn-danger">Remover</button>
            </form>
        </td>
        
    </tr>
        
    <?php
        endforeach
    ?>
</table>    
    

<?php include("rodape.php"); ?>