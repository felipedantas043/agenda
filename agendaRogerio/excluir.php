<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="editar.php">Editar dados dos alunos</a></li>
            </ul>
            
        </nav>

    </header>
    <section>
        <table>
            <tr><th>ID</th> <th>ALUNOS</th> <th>DIAS DE TREINO</th> <th>HORÁRIOS</th> <th>DATA DE PAGAMENTO</th> <th>STATUS</th> <th>VALORES</th></tr>
            <?php
                include 'funcoes.php';
                $f = new tabela();
                $f->mostrar_dados2();
            ?>
        </table>
    </section>

    <br>

    <form class="formid" action="excluir_aluno.php" method="post" >
        <p>Digite o <strong>ID</strong> do aluno a ser excluido!</p>
        <input type="number" name="ID" class="ID" autofocus><br>
        <p style="margin: 50px 0 50px 0;">ATENCÃO: Não sera possível restaurar os dados!</p>
        <input type="submit" value="Excluir" class="submit" >
    </form>
</body>
</html>