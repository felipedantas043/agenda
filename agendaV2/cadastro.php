<?php
    if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confpass']) && !empty($_POST['confpass'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpass = $_POST['confpass'];

        if ($password == $confpass) {
            require 'funcoes.php';

            $f = new tabela();

            $f->cadastroP($nome, $email, $password);
        }else {
            echo "senhas não coecidem!";
        }
    }else {
        echo "preencha todos os dados!";
    }
?>