<?php 
    require 'conexao.php';
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        require_once 'funcoes.php';
        
        $f = new tabela();

        $nomeUser = $f->logged($_SESSION['id']);

        $user = $nomeUser['nome'];



    }else {
        echo "erro no verifica";
        //header("Location: login.php");
    }
    
?>