<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 8</title>
</head>
<body>

    <h1>Exercice 8</h1>
    <h2>Afficher la date du jour + 22 jours.</h2>

    <?php
        $date = date('d-m-Y', strtotime('-22 days'));
    ?>

    <p><strong>Date du jour - 22 jours = </strong><?=$date;?></p>
    

</body>
</html>
