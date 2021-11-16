<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li><a href="adicionar.php">Adicionar aluno</a></li>
                <li><a href="excluir.php">Excluir aluno</a></li>
                <li><a href="editar.php">Editar dados dos alunos</a></li>
            </ul>
            <!-- <ul>
                <li>Nome Professor</li>
                <li><a href="#">menu</a></li>
            </ul> -->
        </nav>

    </header>
    <section>
    <table>
        <tr> <th>ALUNOS</th> <th>DIAS DE TREINO</th> <th>HORÁRIOS</th> <th>DATA DE PAGAMENTO</th> <th>STATUS</th> <th>VALORES</th></tr>
        <!-- <tr><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr> -->
        <?php
            include 'funcoes.php';

            $f = new tabela();

            $f->mostrar_dados();
        ?>
        </table>
    </section>
    <footer>

    </footer>
</body>
</html>