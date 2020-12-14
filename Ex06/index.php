<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 6</title>
</head>
<body>

    <h1>Exercice 5</h1>
    <h2>Afficher le nombre de jour dans le mois de février de l'année 2016.</h2>

    <?php
        $nbDays = cal_days_in_month (CAL_GREGORIAN, 2, 2016);
    ?>

    <p>Il y a <?=$nbDays;?> jours dans le mois de février 2016</p>
    

</body>
</html>
