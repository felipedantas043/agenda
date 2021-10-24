<?php
    require 'verifica.php';
    if (isset($_POST['ID']) && !empty($_POST['ID'])) {
        $id = $_POST['ID'];
        $f->excluir($id, $user);

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