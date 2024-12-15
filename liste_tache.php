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
    <style>
        .transition:hover{
            transform:scale(0.9);
        }
    </style>
    <title>Liste des taches</title>
</head>
<body class="container-sm bg-dark  my-3" >

    <h1 class="text-center pt-5 pb-5  text-light">Liste des taches</h1>
<?php $reqs=$conn->query("SELECT * FROM `task`"); 
                $ligns=$reqs->fetchAll(PDO::FETCH_ASSOC);
                foreach($ligns as $lign)
                {
                ?>
        <div style="text-align: center;"class="d-flex justify-content-center pb-5" >
            <br>
    <div class="card pb-5  transition"  style="width:400px;">
            <div>
                <h3 class="card-title"><?php echo $lign['titre'] ?></h3>
                <h5 class="card-text pb-5"><?php echo mb_substr($lign['tache'],0,20,'UTF-8') ." ..." ?></h4>
            </div>

            <div>
                <a href="afficher_tache.php?id=<?php echo $lign['id'] ?>" class="btn btn-primary">Afficher</a>
                <a href="update.php?id=<?php echo $lign['id'] ?>" class="btn btn-success">Modifier</a>
                <a href="delete.php?id=<?php echo $lign['id'] ?>" class="btn btn-danger">Supprimer</a>
            </div>
            <br>
            <p>Expire le <?php echo $lign['date'] ?> </p>
    </div>

        </div>
        <?php }  ?>

</body>
</html>