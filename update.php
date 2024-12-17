<?php
        require_once('connexion.php');
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                            $req=$conn->prepare("SELECT * FROM task WHERE id=?");
                            $req->execute(array($id));
                            $aff=$req->fetch(PDO::FETCH_ASSOC);
            
                            if(isset($_POST['modifier'])){
                                if(isset($_POST['titre'], $_POST['tache'],$_POST['date']) && !empty($_POST['titre'] && $_POST['tache'] && $_POST['date'])){

                            $titre=htmlspecialchars($_POST['titre']);
                            $tache=htmlspecialchars($_POST['tache']);
                            $date=$_POST['date'];

                            $req2=$conn->prepare("UPDATE task SET titre=?, tache=?, date=? WHERE id=$id");
                            $result=$req2->execute(array($titre,$tache,$date));
            

                                    header('Location: liste_tache.php');
                    }else{
                        //die("Veuillez remplir les champs du formulaire");
                    }
                }else{
                   // die("Veuillez soumettre le formulaire");
                }
                        
            }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Acceuil</title>
</head>
<body class="bg-dark container-sm my-3 border pt-5 pb-5 rounded " >
    <div class="pt-4 pt-4 mt-3">
        <h1 class="text-light text-center ">Ajouter tache</h1>
            <form action="" method="post" class="text-light h3 ">
                <div class=" mt-3">
                    <label for="titre" class="label-form" class="mb-3 mt-3 ">Titre</label>
                    <input type="text" name="titre" value="<?php echo $aff['titre']?>" placeholder="Titre de la tache... " class="form-control" id="titre" required>
                </div>

                <div class="mb-3">
                    <label for="tache" class="mt-3">Tache</label>
                    <textarea class="form-control" rows="2" id="tache" name="tache" placeholder="Tache...." required ><?php echo $aff['tache']?></textarea>
                </div>

                <div class="mb-3">
                    <label for="date" class="label-form">Delai d'execution</label>
                    <input type="date" name="date" id="date" placeholder="Saisir la date " class="form-control">
                </div>

                <div class="d-grid">
                    <input type="submit" value="Modifier tache" class="btn btn-primary btn-block btn-lg" name="modifier">
                </div>
            </form>

            <a href="liste_tache.php" class="btn btn-success">Retour</a>
    </div>
</body>
</html>