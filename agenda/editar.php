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
                <li><a href="excluir.php">Excluir aluno</a></li>
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

    <form action="editar_aluno.php" method="post" class="formid">
        <p>Digite o <strong>ID</strong> do aluno a ser editado.</p>
        <input type="number" name="ID" class="ID" ><br>
        <input type="submit" value="Editar" class="submit" style="background-color: yellowgreen; font-size: 20pt;">
    </form>
</body>
</html>