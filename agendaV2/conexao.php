<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $host = "localhost";
    $dbname = "agenda";
    $user = "root";
    $pass = "";

    global $pdo;
    
    try{
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname , $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch (PDOException $e){
        echo "Erro: ". $e->getMessage()."<br>";
    }
?>