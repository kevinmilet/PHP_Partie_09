<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 7</title>
</head>
<body>

    <h1>Exercice 7</h1>
    <h2>Afficher la date du jour + 20 jours.</h2>

    <?php
        $date = date('d-m-Y', strtotime('+20 days'));
    ?>

    <p><strong>Date du jour + 20 jours = </strong><?=$date;?></p>
    

</body>
</html>
