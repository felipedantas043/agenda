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

                //$res =  "redirecionando para o index. login e senha coecidem!";
                header("Location: index.php");

                return $dados;
            }else{
                ?>
                    <html>
                    <div class="alert alert-danger" role="alert">Email ou senha incorretos.</div>
                    </html>
                <?php
            }

        }
        public function logged($id){
            require 'conexao.php';
            $dados = array();

            $sql = "SELECT * FROM professor WHERE id= :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0 ) {
                $dados = $sql->fetch();

                return $dados;
            }else {
                echo "erro";
            }
        }
        public function cadastroP($nome, $email, $password){
            require 'conexao.php';
            
            $sql = "SELECT * FROM professor WHERE email= :email";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("email", $email);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                ?>
                <html>
                <div class="alert alert-danger mt-3" role="alert">Já existe um usuário com esse email.</div>
                </html>
            <?php
                echo "";
            }else {
                $sql = "INSERT INTO professor (nome, email, password) VALUES(:nome, :email, :password)";
                $sql = $pdo->prepare($sql);
                $sql->bindValue("nome", $nome);
                $sql->bindValue("email", $email);
                $sql->bindValue("password", md5($password));
                $sql->execute();

                ?>
                <html>
                <div class="alert alert-success" role="alert">Cadastrado com sucesso!</div>
                </html>
            <?php
                echo "";
            }
        }
        public function mostrar_dados($idP){
            global $pdo;
            $sql = "SELECT * FROM agenda WHERE professor= :professor";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("professor", $idP);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                while ($dados = $sql->fetch()) {
                    echo "<tbody><tr><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr></tbody>";
                }
            }else{
                echo "Não existem alunos cadastrado.";
            }
        }
        public function mostrar_dados2($nomeP){
            require 'conexao.php';
            $sql = "SELECT * FROM agenda WHERE professor= :professor";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("professor", $nomeP);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                while ($dados = $sql->fetch()) {
                    echo "<tr><td>{$dados['id']}</td><td> {$dados['alunos']} </td><td> {$dados['dias_de_treino']} </td><td>{$dados['horarios']}</td><td>{$dados['data_pagamento']}</td><td>{$dados['status']}</td><td>{$dados['valores']}</td></tr>";
                }
            }else{
                echo "Não existem alunos cadastrado.";
            }
        }
        public function add_aluno($nome, $dias_de_treino, $horarios, $data_pagamento, $status, $valor, $nomeP){
            if (empty($nome) && empty($dias_de_treino) && empty($horarios) && empty($data_pagamento) && empty($status) && empty($valor)) {
                ?>
                    <html>
                    <div class="alert alert-danger mt-3" role="alert">Preencha todos os dados.</div>
                    </html>
                <?php
            }else {
                
                require 'conexao.php';
                $nomelower = strtolower($nome);
                
                $sql = "SELECT * FROM agenda
                where alunos= :nome_aluno";
                $sql = $pdo->prepare($sql);
                $sql->bindValue("nome_aluno", ucwords($nomelower));
                $sql->execute();
                
                if ($sql->rowCount() > 0) {
                    ?>
                    <html>
                    <div class="alert alert-danger mt-3" role="alert">Aluno já cadastrado.</div>
                    </html>
                <?php
                    
                }else{
                    $sql = "INSERT INTO agenda (alunos, dias_de_treino, horarios, data_pagamento, status, valores, professor) VALUES(:aluno, :dia_treino, :horario, :data_pagamento, :status, :valor, :professor)";
                    $sql = $pdo->prepare($sql);
                    $sql->bindValue("aluno", ucwords($nomelower));
                    $sql->bindValue("dia_treino", $dias_de_treino);
                    $sql->bindValue("horario", $horarios);
                    $sql->bindValue("data_pagamento", $data_pagamento);
                    $sql->bindValue("status", $status);
                    $sql->bindValue("valor", $valor);
                    $sql->bindValue("professor", $nomeP);
                    $sql->execute();
                    
                    ?>
                    <html>
                    <div class="alert alert-success" role="alert">Aluno cadastrado com sucesso!</div>
                    </html>
                <?php
                }
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
        public function excluir($id, $nomeP){
            include 'conexao.php';

            $sql = "SELECT * FROM agenda
            WHERE id= :id AND professor= :professor";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("professor", $nomeP);
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
        public function verifica_id($id, $nomeP){
            include 'conexao.php';

            $sql = "SELECT * FROM agenda
            WHERE id= :id AND professor= :professor";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("professor", $nomeP);
            $sql->bindValue("id", $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $res = true;
            }else {
                $res = false;
            }
            return $res;
        }
        public function editar_aluno($id, $nomeP){
            include 'conexao.php';

            $sql = "SELECT * FROM agenda
            WHERE id= :id AND professor= :professor";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("professor", $nomeP);
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