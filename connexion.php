<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWD', '');
    define('BDD', 'todo-list');

        $dsn='mysql:host='.HOST. ';dbname='.BDD;

            try{
                $conn=new PDO ($dsn, USER,PASSWD);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $conn->exec("SET NAMES UTF8");
            }catch(PDOException $e){
                die ('Connexion echouer'. $e->getMessage());
            }
?>