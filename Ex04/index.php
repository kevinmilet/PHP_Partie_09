<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - Ex 4</title>
</head>
<body>

    <h1>Exercice 4</h1>
    <h2>Afficher le timestamp du jour.</h2>
    <h3>Afficher le timestamp du mardi 2 août 2016 à 15h00.</h3>

    <p><strong>Timestamp actuel : </strong><?=time();?></p>
    <p><strong>Timestamp au mardi 2 août 2016 à 15h00 : </strong><?=mktime(15, 0, 0, 8, 2, 2016);?></p>

</body>
</html>
