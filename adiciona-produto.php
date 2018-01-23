<?php 
    include("cabecalho.php"); 
    include("conecta.php");
    include("banco-produto.php");
?>

<?php
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria_id = $_POST["categoria_id"];
    if(array_key_exists("usado", $_POST)){
        $usado = "true";
    }else{
        $usado="false";
    }
    

?>
<?php
if(insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)){
?>
    <p class="alert-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php
}else{
    $msg_erro = mysqli_error($conexao);    
?>
    <p class="alert-danger">O produto <?= $nome; ?> não foi adicionado: <?=$msg_erro ?></p>
<?php
}
?>    
   
<?php include("rodape.php"); ?>