<?php
class tabela {
    public function logar($email, $password){
        require 'conexao.php';

        $sql = "SELECT * FROM professor WHERE email= :email AND password= :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $dados = $sql->fetch();

            $_SESSION['id'] = $dados['id'];

            header("Location: index.php");

            return $dados;
        }else{
            echo "Email ou senha incorretos.";
        }


    }
    public function mostrar_dados(){
        require 'conexao.php';
        $sql = "SELECT * FROM agenda";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            while ($dados = $sql->fetch()) {
                echo "<tr><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr>";
            }
        }else{
            echo "Não existem alunos cadastrado.";
        }
    }
    public function mostrar_dados2(){
        require 'conexao.php';
        $sql = "SELECT * FROM agenda
        ";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            while ($dados = $sql->fetch()) {
                echo "<tr><td>{$dados['id']}</td><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr>";
            }
        }else{
            echo "Não existem alunos cadastrado.";
        }
    }
    public function add_aluno($nome, $dias_de_treino, $horarios, $data_pagamento, $status, $valor){
        require 'conexao.php';
        $nomelower = strtolower($nome);

        $sql = "SELECT * FROM agenda
         where alunos= :nome_aluno";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("nome_aluno", ucwords($nomelower));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo "ERRO: Aluno já cadastrado!";

        }else{
            $sql = "INSERT INTO agenda (alunos, dias_de_treino, horarios, data_pagamento, status, valores) VALUES(:aluno, :dia_treino, :horario, :data_pagamento, :status, :valor)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("aluno", ucwords($nomelower));
            $sql->bindValue("dia_treino", $dias_de_treino);
            $sql->bindValue("horario", $horarios);
            $sql->bindValue("data_pagamento", $data_pagamento);
            $sql->bindValue("status", $status);
            $sql->bindValue("valor", $valor);
            $sql->execute();

            echo "Aluno cadastrado com sucesso! <br>Você será redirecionado a página inicial. Aguarde.";
        }
        
    }
    public function editar($id, $nome, $dias_de_treino, $horarios, $data_pagamento, $status, $valor){
        require 'conexao.php';
        $nomelower = ucwords(strtolower($nome));

        $sql = "SELECT * FROM agenda where id= :id";
       $sql = $pdo->prepare($sql);
       $sql->bindValue("id", $id);
       $sql->execute();

       if ($sql->rowCount() > 0) {

        $sql = "UPDATE agenda SET alunos = :aluno, dias_de_treino= :dia_treino, horarios= :horario, data_pagamento= :data_pagamento, status= :status, valores= :valor WHERE agenda.id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->bindValue("aluno", $nomelower);
        $sql->bindValue("dia_treino", $dias_de_treino);
        $sql->bindValue("horario", $horarios);
        $sql->bindValue("data_pagamento", $data_pagamento);
        $sql->bindValue("status", $status);
        $sql->bindValue("valor", $valor);
        $sql->execute();

        echo "Aluno editado com sucesso! <br>Você será redirecionado a página inicial. Aguarde.";
       }else {
           echo "Digite um ID válido!";
       }
        

    }
    public function excluir($id){
        include 'conexao.php';

        $sql = "SELECT * FROM agenda
         WHERE id= :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $sql = "DELETE FROM agenda
             WHERE id= :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();
            echo "O usuário com o ID ".$id." foi excluido com sucesso! Você será redirecionado para a página inicial. Aguarde.";
        }else{
            echo  "Não foi encontrado nenhum dado. Você será redirecionado para a página inicial. Aguarde.";
        }
    }
    public function verifica_id($id){
        include 'conexao.php';

        $sql = "SELECT * FROM agenda WHERE id= :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $res = true;
        }else {
            $res = false;
        }
        return $res;
    }
    public function editar_aluno($id){
        include 'conexao.php';

        $sql = "SELECT * FROM agenda WHERE id= :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        $dados = array();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $_SESSION['dados'] = $dados;
            
            return $dados;
        }else {
            echo "Id não encontrado!";
            return false;
            ?>
                <html>
                    <script>
                        setTimeout(function(){
                            window.location.href = "editar.php"
                        }, 2000)
                    </script>
                </html>
            <?php
            
        }
    }
}

?>