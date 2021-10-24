<?php
    require 'verifica.php';

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])):

        if ($f->verifica_id($_POST['ID'], $user) == true):
            if (isset($_POST['ID']) && !empty($_POST['ID'])):
                $id = $_POST['ID'];
                $id = $_POST['ID'];

                $f->editar_aluno($id, $user);
                $dados = $_SESSION['dados'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<html>
    <header>
        <nav class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="excluir.php">Excluir aluno</a></li>
                <li><a href="editar.php">Editar dados dos alunos</a></li>
            </ul>
            <!-- <ul>
                <li>Nome Professor</li>
                <li><a href="#">menu</a></li>
            </ul> -->
        </nav>

    </header>
<form action="editar_aluno2.php" method="post" style="display: flex;">

            <input type="hidden" name="id" value="<?=$dados['id'];?>">
           <div class="inputs">
               <label for="aluno">Nome do aluno</label>
               <input type="text" name="aluno" value="<?php echo $dados['alunos'];?>">
           </div>

           <div class="inputs">
               <label for="dias_de_treino"> Dias de treino</label>
               <input type="text" name="dias_de_treino" value="<?php echo $dados['dias_de_treino'];?>">
           </div>

           <div class="inputs">
               <label for="horarios">Horários</label>
               <input type="text" name="horarios" value="<?php echo $dados['horarios'];?>">
           </div>

           <div class="inputs">
               <label for="data_de_pagamento">Data de pagamento</label>
               <input type="text" name="data_de_pagamento" value="<?php echo $dados['data_pagamento'];?>">
           </div>

           <div class="inputs">
               <label for="status">Status do pagamento</label>
               <input type="text" name="status" value="<?php echo $dados['status'];?>">
           </div>

           <div class="inputs">
               <label for="valor">Valor da mensalidade</label>
               <input type="text" name="valor" value="<?php echo $dados['valores'];?>">
           </div>
           <input type="submit" value="Editar">
       </form>
</html>
<!-- <html>
    <script>
        setTimeout(function(){
            window.location.href = "index.php"
        }, 4000)
    </script>
</html> -->
<?php
            endif;
        else:       
            echo "ID não encontrado.";
        ?>
        <html>
            <script>
                setTimeout(function(){
                    window.location.href = "editar.php"
                }, 2000)
            </script>
            </html>
        <?php 
        endif;
    
    else:   header("Location: login.php"); endif;
?>