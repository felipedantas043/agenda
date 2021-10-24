<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

            $f->add_aluno($nome, $dias_de_treino, $horarios, $data_de_pagamento, $status, $valor);
        }else{
            echo "Preencha todos os dados!";
        }
        ?>
        <html>
            <script>
                setTimeout(function(){
                    window.location.href = "index.php"
                }, 3000)
            </script>
            </html>
        <?php

    ?>
</body>
</html>