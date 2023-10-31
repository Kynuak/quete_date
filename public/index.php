<?php

$presentTime = new DateTime();
$destinationTime = new DateTime();


//echo $destinationTime->format("M / d / Y / A g : i") . "<br>";
if(!empty($_POST)) {

    if(!empty($_POST["date"]) && !empty($_POST["time"])) {
        $destinationTime = new DateTime($_POST['date'].$_POST['time'] );
        $diffTime = $presentTime->diff($destinationTime);
        $nbDiffDay = $diffTime->days;
        $nbMinutesDiff = $nbDiffDay * 1440;
        $nbLitre = $nbMinutesDiff / 10000;
        $nbLitre = number_format($nbLitre, 2, ",", " ");
        
        
    } else {
        echo "Donner une date de destination";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <main>
        <div class="destination">
            <div class="date">
                <div>
                    <h3>Month</h3>
                    <span><?= strtoupper($destinationTime->format("M")) ?></span>
                </div>
                <div>
                    <h3>Day</h3>
                    <span><?= $destinationTime->format("d") ?></span>
                </div>
                <div>
                    <h3>Year</h3>
                    <span><?= $destinationTime->format("Y") ?></span>
                </div>
                <div>
                    <div class="flex_AM_PM">
                        <h3>AM</h3>
                        <div class="am_pm"><div class="<?php if($destinationTime->format("A") === "AM") {echo "actif";} ?>"></div></div>
                    </div>
                    <div class="flex_AM_PM">
                        <h3>PM</h3>
                        <div class="am_pm"><div class="<?php if($destinationTime->format("A") === "PM") {echo "actif";} ?>"></div></div>
                    </div>
                </div>
                <div>
                    <h3>Hour</h3>
                    <span><?= $destinationTime->format("g") ?></span>
                </div>
                <div>
                    <h3>Min</h3>
                    <span><?= $destinationTime->format("i") ?></span>
                </div>
            </div>

            <div class="dateTitle"> 
                <h2>Destination Time</h2>
            </div>
        </div>

        <div class="present">
            <div class="date">
                <div>
                    <h3>Month</h3>
                    <span><?= strtoupper($presentTime->format("M")) ?></span>
                </div>
                <div>
                    <h3>Day</h3>
                    <span><?= $presentTime->format("d") ?></span>
                </div>
                <div>
                    <h3>Year</h3>
                    <span><?= $presentTime->format("Y") ?></span>
                </div>
                <div>
                    <div class="flex_AM_PM">
                        <h3>AM</h3>
                        <div class="am_pm"><div class="<?php if($presentTime->format("A") === "AM") {echo "actif";} ?>"></div></div>
                    </div>
                    <div class="flex_AM_PM">
                        <h3>PM</h3>
                        <div class="am_pm"><div class="<?php if($presentTime->format("A") === "PM") {echo "actif";} ?>"></div></div>
                    </div>
                </div>
                <div>
                    <h3>Hour</h3>
                    <span><?= $presentTime->format("g") ?></span>
                </div>
                <div>
                    <h3>Min</h3>
                    <span><?= $presentTime->format("i") ?></span>
                </div>
            </div>
            
            <div class="dateTitle">
                <h2>Present Time</h2>
            </div>
        </div>
    </main>
    <form method="POST">
        <div>
            <label>Sélectionner la date de destination : </label>
            <input type="date" name="date">
        </div>
        <div>
            <label for="">Sélectionner une heure d'arrivé :</label>
            <input type="time" name="time">
        </div>
        <button>Let's Go !</button>
    </form>

    <div>
    <?php

        if(!empty($_POST)): ?>

            <p><?= $diffTime->format("%m month %d days %y year %h hour %i minutes %s second"); ?></p>
            <p><?= "Ce qui représente " . $nbDiffDay . "jours d'écarts entre les dates"; ?></p>
            <p><?= "Ce qui représente " . $nbMinutesDiff . " minutes."; ?></p>
            <p><?= "Il faudra " . $nbLitre . " litres de carburants pour arrivé a destination"; ?></p>
        <?php endif ?>

    </div>

</body>
</html>