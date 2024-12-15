<?php
    require_once 'connexion.php';
        if(isset($_GET['id'])){
            $id=$_GET['id'];

                $req=$conn->prepare("DELETE FROM task WHERE id=?");
                $del=$req->execute(array($id));
                    header('Location: liste_tache.php');
        }
?>