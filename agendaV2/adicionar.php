<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Agenda</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Agenda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="justify-content: space-between;" class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="adicionar.php">Adicionar aluno</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="excluir.php">Excluir aluno</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="editar.php">Editar dados dos alunos</a>
            </li>
            </ul>

            <div style="display: flex; margin-right: 0;">
                <div class="btn-group" style="display: inline;">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configurações
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Editar dados pessoais</a>
                    <a class="dropdown-item" href="#">Excluir usuário</a>
                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="exit.php">Sair</a>
                </div>
                </div>
            </div>
        </div>
    </nav>
    <section style="margin: 0 auto; width: 90%;">
        <form  method="post" class="mt-5 mb-5">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome do aluno</label>
                <input type="text" name="aluno" class="form-control" id="formGroupExampleInput" placeholder="" autofocus>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Dias de treino</label>
                <input type="text" name="dias_de_treino" class="form-control" id="formGroupExampleInput2" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Horários</label>
                <input type="text" name="horarios" class="form-control" id="formGroupExampleInput3" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Data de pagamento</label>
                <input type="text" name="data_de_pagamento" class="form-control" id="formGroupExampleInput4" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Status do pagamento</label>
                <input type="text" name="status" class="form-control" id="formGroupExampleInput5" placeholder="">
            </div> <div class="form-group">
                <label for="formGroupExampleInput6">Valor da mensalidade</label>
                <input type="text" name="valor" class="form-control" id="formGroupExampleInput6" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary mr-3">Cadastrar</button>
            <a class="btn btn-primary" href="index.php">Voltar</a>
            <br>
            <?php

        if (isset($_POST['aluno']) && !empty($_POST['aluno']) && isset($_POST['dias_de_treino']) && !empty($_POST['dias_de_treino']) && isset($_POST['horarios']) && !empty($_POST['horarios']) && isset($_POST['data_de_pagamento']) && !empty($_POST['data_de_pagamento']) &&isset($_POST['status']) && !empty($_POST['status']) && isset($_POST['valor']) && !empty($_POST['valor'])) {
            include 'funcoes.php';
            $nome = $_POST['aluno'];
            $dias_de_treino = $_POST['dias_de_treino'];
            $horarios = $_POST['horarios'];
            $data_de_pagamento = $_POST['data_de_pagamento'];
            $status = $_POST['status'];
            $valor = $_POST['valor'];

            $f = new tabela();
            include 'verifica.php';

            $f->add_aluno($nome, $dias_de_treino, $horarios, $data_de_pagamento, $status, $valor, $user);
        }
    ?>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
