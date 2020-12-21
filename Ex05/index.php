<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 5</title>
</head>
<body>

    <h1>Exercice 5</h1>
    <h2>Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</h2>

    <?php
        // on stocke la date du 16 mai 2016
        $startDate = new DateTime('2016-05-16');
        // on stocke la date du jour
        $today = new DateTime(date('Y-m-j'));

        // on calcule la différence de jour entre aujourd'hui et la 1ere date
        $nbDays = $today->diff($startDate)->format('%a');
    ?>

    <p><strong>Nombre de jours entre le 16 mai 2016 et aujourd'hui : </strong><?=$nbDays;?> jours</p>
    

</body>
</html>
