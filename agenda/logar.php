<?php
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        require 'funcoes.php';

        $f = new tabela();

        $f->logar($email, $password);
    }else {
        echo "erro";
    }
?>