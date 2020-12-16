<?php

    // vérifie si les parametres sont présents, sinon on leur donne une valeur par défaut -> mois et année en cours
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
    $firstDay = intval(strftime('%u', strtotime($year.'-'.$month.'-01')));

    // dernier jour du mois choisi
    $lastDay = intval(strftime('%u', strtotime($year.'-'.$month.'-'.$nbDays)));

    // remplissage du tableau calendrier
    $calendar = array();

    for ($a = 1; $a <= $firstDay - 1; $a++) {
        array_push($calendar, null);
    }
    for ($b = 1; $b <= $nbDays; $b++) {
        array_push($calendar, $b);
    }
    for ($c = $lastDay - 1; $c < 6; $c++) {
        array_push($calendar, null);
    }

    $caseClass = '';

    // fonction pour déterminer si le jour est férié
    function jour_ferie($timestamp) {
        $jour = date("d", $timestamp);
        $mois = date("m", $timestamp);
        $annee = date("Y", $timestamp);
        $EstFerie = 0;
        $holiday = '';

        // dates fériées fixes
        if ($jour == 1 && $mois == 1) {
            $EstFerie = 1; // 1er janvier
            $holiday = 'Jour de l\'an';
        }
        if ($jour == 1 && $mois == 5) {
            $EstFerie = 1; // 1er mai
        }
        if ($jour == 8 && $mois == 5) {
            $EstFerie = 1; // 8 mai
        }
        if ($jour == 14 && $mois == 7) {
            $EstFerie = 1; // 14 juillet
        }
        if ($jour == 15 && $mois == 8) {
            $EstFerie = 1; // 15 aout
        }
        if ($jour == 1 && $mois == 11) {
            $EstFerie = 1; // 1 novembre
        }
        if ($jour == 11 && $mois == 11){
            $EstFerie = 1; // 11 novembre
        } 
        if ($jour == 25 && $mois == 12){
            $EstFerie = 1; // 25 décembre
        } 

        // fetes religieuses mobiles
        $pak = easter_date($annee);
        $jp = date("d", $pak);
        $mp = date("m", $pak);

        if ($jp == $jour && $mp == $mois){
            $EstFerie = 1;
        } // Pâques

        $lpk = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak), date("d", $pak) +1, date("Y", $pak) );
        $jp = date("d", $lpk);
        $mp = date("m", $lpk);

        if ($jp == $jour && $mp == $mois){
            $EstFerie = 1;
        }// Lundi de Pâques

        $asc = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak), date("d", $pak) + 39, date("Y", $pak) );
        $jp = date("d", $asc);
        $mp = date("m", $asc);

        if ($jp == $jour && $mp == $mois){
            $EstFerie = 1;
        }//ascension

        $pe = mktime(date("H", $pak), date("i", $pak), date("s", $pak), date("m", $pak), date("d", $pak) + 49, date("Y", $pak) );
        $jp = date("d", $pe);
        $mp = date("m", $pe);

        if ($jp == $jour && $mp == $mois) {
            $EstFerie = 1;
        }// Pentecôte

        $lp = mktime(date("H", $asc), date("i", $pak), date("s", $pak), date("m", $pak), date("d", $pak) + 50, date("Y", $pak) );
        $jp = date("d", $lp);
        $mp = date("m", $lp);

        if ($jp == $jour && $mp == $mois) {
            $EstFerie = 1;
        }// lundi Pentecôte

        return $EstFerie;
}
?>

<!-- partie html de la page -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 9 - TP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css" class="css">
</head>
<body>

    <div class="container">
        
        <!-- Formulaire permettant de choisir un mois et une année -->
        <div class="mt-2 formular">

            <p>Choisissez un mois et une année: </p>

            <form action="index.php" method="get" class="form-inline">

                <div class="form-group ml-2">
                    <label for="month">Mois</label>
                    <select name="month" id="month" class="form-control ml-2">
                        <?php
                            foreach ($monthList as $key => $value) {
                                echo '<option value="'.$key.'">'.$value.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group ml-2">
                    <label for="year">Année</label>
                    <select name="year" id="year" class="form-control ml-2">
                        <?php
                            for ($i = (date('Y') - 5); $i <= (date('Y') + 10); $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>

            </form>

        </div>

        <!-- Calendrier -->
        <div class="container my-5">
            <div class="row month-title">
                <h4 class="month-year"><?=$monthList[$month];?> <?=$year;?> <a href=""><i class="fas fa-chevron-left"></i></a> <a href=""><i class="fas fa-chevron-right"></i></a></h4>
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
                $chunkCalendar = array_chunk($calendar, 7);
                foreach($chunkCalendar as $week => $days) {
                    echo '<div class="row">';
                    foreach($chunkCalendar[$week] as $day){
                        if ($day == null) {
                            $caseClass = ' empty';
                        } elseif ($day.'-'.$month.'-'.$year == date('j-m-Y')){
                            $caseClass = ' current';
                        } elseif (jour_ferie(strtotime($day.'-'.$month.'-'.$year)) == 1) {
                            $caseClass = ' holiday';
                        } else {
                            $caseClass = '';
                        }
                        echo '<div class="col day-case'.$caseClass.'">'.$day.'</div>';
                    }
                    echo '</div>';
                }
            ?>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>