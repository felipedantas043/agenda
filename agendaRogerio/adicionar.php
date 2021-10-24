<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        form{
            padding: 20px;
            width: 600px;
            margin: 0 auto;

            display: grid;
            justify-items: center;
            text-justify: end;
        }
        input{
            padding: 5px;
            margin: 10px;
            width: 400px;
            
        }
        .inputs{
            display: grid;
        }
        .inputs label{
            margin-left: 11px;
        }
    </style>
    <title>Agenda</title>
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
       <form action="cadastrar_aluno.php" method="post">
           <div class="inputs">
               <label for="aluno">Nome do aluno</label>
               <input type="text" name="aluno" autofocus>
           </div>

           <div class="inputs">
               <label for="dias_de_treino"> Dias de treino</label>
               <input type="text" name="dias_de_treino">
           </div>

           <div class="inputs">
               <label for="horarios">Horários</label>
               <input type="text" name="horarios">
           </div>

           <div class="inputs">
               <label for="data_de_pagamento">Data de pagamento</label>
               <input type="text" name="data_de_pagamento">
           </div>

           <div class="inputs">
               <label for="status">Status do pagamento</label>
               <input type="text" name="status">
           </div>

           <div class="inputs">
               <label for="valor">Valor da mensalidade</label>
               <input type="text" name="valor">
           </div>
           <input type="submit" value="Cadastrar aluno">
       </form>
    </section>
    <footer>

    </footer>
</body>
</html>
