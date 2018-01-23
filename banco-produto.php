<?php

    function listaProdutos($conexao){
        $query = "select p.*, c.nome as categoria_nome from produtos p join categoria c on p.categoria_id = c.id";
        $resultado = mysqli_query($conexao, $query);
    
        $produtos = array();
        while($produto = mysqli_fetch_assoc($resultado)){

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function buscaProduto($conexao, $id){
        $query = "select * from produtos where id={$id}";
        $resultado = mysqli_query($conexao, $query);
        
        return mysqli_fetch_assoc($resultado);
    }

    function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado){
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
        values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
        $resultadoDaInsercao = mysqli_query($conexao, $query);

        return $resultadoDaInsercao;
    }

    function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
        $query = "update produtos 
        set nome='{$nome}', preco={$preco}, descricao='{$descricao}', categoria_id={$categoria_id} , usado={$usado}
        where id={$id} ";

        return mysqli_query($conexao, $query);
    }
    
    function removeProduto($conexao, $id) {
        $query = "delete from produtos where id = {$id}";

        return mysqli_query($conexao, $query);
    }