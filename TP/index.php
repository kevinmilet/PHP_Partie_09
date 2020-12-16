<?php

    // vérifie si les parametres sont présent, sinon on leur donne une valeur par défaut -> mois et année en cours
    if (empty($_GET['month']) && empty($_GET['year'])) {
        $month = date('n');
        $year = date('Y');
    } else {
        $month = $_GET['month'];
        $year = $_GET['year'];
    }
    
    // liste des mois en français
    $monthList = array(
        '1'=>'Janvier',
        '2'=>'Février',
        '3'=>'Mars',
        '4'=>'Avril',
        '5'=>'Mai',
        '6'=>'Juin',
        '7'=>'Juillet',
        '8'=>'Août',
        '9'=>'Septembre',
        '10'=>'Octobre',
        '11'=>'Novembre',
        '12'=>'Décembre'
    );

    // nombre de jours dans le mois choisi    
    $nbDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // 1er jour du mois choisi
    setlocale(LC_ALL, 'fr_FR', 'french', 'fra');
    $firstDay = strftime('%A', strtotime($year.'-'.$month.'-01'));
    $firstDayNumber = strftime('%u', strtotime($year.'-'.$month.'-01'));

    // dernier jour du mois
    $lastDay = date('t', mktime(0, 0, 0, $month, 1, $year));
    var_dump($lastDay);

    $calendar = [null, null, null, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, null];
?>

<!-- partie html de la page -->
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

        <!-- Formulaire permettant de choisir un mois et une année -->
        <div class="formular">

            <p>Choisissez un mois et une année: </p>
        
            <form action="index.php" method="get" class="form-inline">

                <div class="form-group ml-2">
                    <label for="month">Mois</label>
                    <select name="month" id="month" class="form-control ml-2">
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
                
                <div class="form-group ml-2">
                    <label for="year">Année</label>
                    <select name="year" id="year" class="form-control ml-2">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                
                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>

            </form>

        </div>

        <p>Le mois de <?=$monthList[$month];?> <?=$year;?> commence un <?=$firstDay.' '.$firstDayNumber;?> et a <?=$nbDays;?> jours.</p>
        
        <!-- Calendrier -->
        <div class="container mb-5">
            <div class="row month-title">
                <h4 class="month-year"><?=$monthList[$month];?> <?=$year;?></h4>
            </div>
            <div class="row days">
                <div class="col">
                    <h5 class="text-center">Lundi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Mardi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Mercredi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Jeudi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Vendredi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Samedi</h5>
                </div>
                <div class="col">
                    <h5 class="text-center">Dimanche</h5>
                </div>
            </div>

            <!-- Rendu du calendrier -->
            <?php
                foreach ($calendar as $key => $day) {
                    if ($key%7 == 0) {
                        echo '<div class="row">';
                    }
                    if (($key-1)%7 == 0) {
                        echo '</div>';
                    }
                }    
                    // echo '</div>';
                    //     for ($i = 1; $i <= $firstDayNumber; $i++) {
                    //         echo '<div class="col day-case"></div>'; 
                    //     }
                    //     for ($i = $firstDayNumber; $i <= $lastDay; $i++) {
                    //         echo '<div class="col day-case">'. $day .'</div>';
                    //     }
                    //     for ($i = $lastDay; $i <= $nbDays; $i++) {
                    //         echo '<div class="col day-case"></div>';
                            
                    //     }
                    // }
                // }
                
                
            ?>
            
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>