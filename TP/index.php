<?php
    $month = $_GET['month'];
    $year = $_GET['year'];
    $monthList = array(
        '1'=>'janvier',
        '2'=>'février',
        '3'=>'mars',
        '4'=>'avril',
        '5'=>'mai',
        '6'=>'juin',
        '7'=>'juillet',
        '8'=>'août',
        '9'=>'septembre',
        '10'=>'octobre',
        '11'=>'novembre',
        '12'=>'décembre'
    );

    // connaitre le nombre de jours dans le mois choisi
    function nbDaysInMonth($month, $year) {
        $nbDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $nbDaysInMonth;
    };

    // connaitre quel jour commence le mois
    function monthStart($month, $year) {
        setlocale(LC_TIME, 'fr_FR', 'french', 'fra');
        $monthStart = strftime('%A', strtotime($year.'-'.$month.'-01'));
        return $monthStart;
    };

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - TP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" class="css">
</head>
<body>

    <div class="container">
        <h1>Partie 9 - TP</h1>
        <p>Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.</p2>
        <p>En fonction des choix, afficher un calendrier comme celui-ci : </p>
        <a href="http://icalendrier.fr/media/imprimer/2017/mensuel/calendrier-2017-mensuel-bigthumb.png" target="_blank">http://icalendrier.fr/media/imprimer/2017/mensuel/calendrier-2017-mensuel-bigthumb.png</a>

        <hr>

        <div class="formular">

            <p>Choisissez un mois et une année: </p>
        
            <form action="index.php" method="get" class="form-inlines">

                <div class="form-group">
                    <label for="month">Mois</label>
                    <select name="month" id="month">
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="year">Année</label>
                    <select name="year" id="year">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>

            </form>

        </div>

        <hr>
        
        <p>Le mois de <?=$monthList[$month];?> <?=$year;?> commence un <?=monthStart($month, $year);?> et a <?=nbDaysInMonth($month, $year);?> jours.</p>
        
    </div>

    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
