<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 3</title>
</head>
<body>

    <h1>Exercice 3</h1>
    <h2>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)</h2>
    <h3>Bonus : Le faire en français.</h3>

    <?php
        setlocale(LC_TIME, ['fr.UTF8', 'fra.UTF8', 'fr_FR.UTF8']);
    ?>

    <p><strong>Date du jour : </strong><?=strftime('%A %d %B %Y');?></p>

</body>
</html>
