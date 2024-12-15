<?php
    require_once 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Afficher taches</title>
</head>
<body class="container-sm bg-dark  my-3" >

<?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $reqs=$conn->query("SELECT * FROM `task` WHERE id=$id"); 
            $ligns=$reqs->fetchAll(PDO::FETCH_ASSOC);
            foreach($ligns as $lign)
            {

                ?>
        <div style="text-align: center;"class="d-flex justify-content-center pb-5 pt-5" >
            <br>
    <div class="card pb-5 pt-5" style="width:80%;height: 500px;">
            <div>
                <h3 class="card-title">Titre:<?php echo $lign['titre'] ?></h3> <br>
                <h5 class="card-text pb-5"><?php echo $lign['tache'] ?>.</h5>
            </div>
    </div>

        </div>
        <?php }  
                }
                ?>

            <div >
                <a href="index.php" class="btn btn-success" style="margin-right:68%;">Ajouter une nouvelle tache</a>
                <a href="liste_tache.php" class="btn btn-success">Liste des taches</a>
            </div>
</body>
</html>