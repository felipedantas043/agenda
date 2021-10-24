<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>


    <section style="margin: 0 auto; width: 90%;">
        <form  method="post" class="mt-5">
            <div class="form-group">
                <label for="formGroupExampleInput">Digite seu nome</label>
                <input type="text" name="nome" class="form-control" id="formGroupExampleInput" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Exemplo: email@gmail.com">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Senha</label>
                <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="*******">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Confirme sua senha</label>
                <input type="password" name="confpass" class="form-control" id="formGroupExampleInput2" placeholder="*******">
            </div>
            <button type="submit" class="btn btn-primary mr-3">Cadastrar</button>
            <a class="btn btn-primary" href="index.php">Voltar</a>
            <br>
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
            ?>
            <html>
            <div class="alert alert-danger mt-3" role="alert">Senhas não coecidem.</div>
            </html>
        <?php
        }
    }
?>
        </form>
    </section>
</body>
</html>