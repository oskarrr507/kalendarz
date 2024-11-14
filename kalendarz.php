<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <style>
    .container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        width: 100%;
        gap: 5px; 
        margin: 1px auto;
    }

    .box, .dni {
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ccc; 
        border-radius: 8px; 
        font-size: 14px; 
        background-color: #f9f9f9;
        padding: 5px; 
        text-align: center;
    }

    .dni {
        height: 30px;
        font-weight: bold; 
    }

    .dni.niedz, .box.niedz {
        color: red;
    }
    .box.akt-tydz {
        background-color: #C0C0C0;
    }
    .box.akt-tydz1 {
        background-color: #008000;
    }
    .box.akt-tydz2 {
        background-color: #FFCCDD;
    }

</style>
</head>
<body>

<div class="container">
<div class="dni">Pn</div>
<div class="dni">Wt</div>
<div class="dni">Śr</div>
<div class="dni">Cz</div>
<div class="dni">Pt</div>
<div class="dni">So</div>
<div class="dni niedz">Nd</div>
<?php

$miesiace = [
    1 => 'styczeń',
    2 => 'luty',
    3 => 'marzec',
    4 => 'kwiecień',
    5 => 'maj',
    6 => 'czerwiec',
    7 => 'lipiec',
    8 => 'sierpień',
    9 => 'wrzesień',
    10 => 'październik',
    11 => 'listopad',
    12 => 'grudzień'
];
        $startDate = strtotime('01.11.2024');

        $akttydz = date('W');
        $akttydz1 = date ('W')+1;
        $akttydz2 = date ('W')-1;

        $dzientyg = date('N', $startDate);

        for ($i = 1; $i < $dzientyg; $i++) {
            echo '<div class="box"></div>';
        }

        for ($i = 0; $i < 30; $i++) {
            $aktdata = strtotime("+$i days", $startDate);
            $data = date('j', $aktdata);
            $miesiacnumer = date('n', $aktdata);
            $miesiacnazwa = $miesiace[$miesiacnumer];
            $aktdzientyg = date('N', $aktdata);
            $weekofyear = date('W', $aktdata);

            $class = 'box';
            if ($aktdzientyg == 7) $class .= ' niedz';
            if ($weekofyear == $akttydz) $class .= ' akt-tydz';
            if ($weekofyear == $akttydz1) $class .= ' akt-tydz1';
            if ($weekofyear == $akttydz2) $class .= ' akt-tydz2';

            echo '<div class="' . $class . '">' . $data . ' '. $miesiacnazwa . '</div>';
        }
    ?>
</div>

</body>
</html>
