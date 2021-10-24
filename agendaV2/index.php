<?php
    require 'verifica.php';

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])):

?>

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
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
                <div style="margin: 0 30px 0 10px; padding-top: 5px; " class="nav-link disabled" ><?php echo $user;?></div>

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
        <section>
        <table class="table-responsive-lg table-hover">
            <thead><tr><th scope="col">ALUNOS</th> <th scope="col">DIAS DE TREINO</th> <th scope="col">HORÁRIOS</th> <th scope="col">DATA DE PAGAMENTO</th> <th scope="col">STATUS</th> <th scope="col">VALORES</th></tr></thead>
  
            <!-- <tr><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr> -->
            <?php
                $f->mostrar_dados($user);
            ?>
        </table>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
    </html>
<?php
    else:   header("Location: login.php"); endif;
?>