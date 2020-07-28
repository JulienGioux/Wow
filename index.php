<?php
    require_once('Model\Character.php');
    require_once('Model\Hero.php');
    require_once('Model\Orc.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>WoW Alpha_0.01</title>
</head>
<body class="container-fluid">
    <section class="row">
        <div class="card mb-3 mx-3 col-md-5">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="assets\img\hero.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p>
                            <?php $myHero = new Hero(2000, 0, 'excalibure', 250, 'Le bouclier d\'Achille', 600);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 mx-3 col-md-5">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="assets\img\orc.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p>
                    <?php $myOrc = new Orc(800, 0);?>  
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <?php
            while ($myHero->getHealth() > 0 && $myOrc->getHealth() > 0) {
        ?>
        <p>
        <?php
            $myOrc->attack();
            $myHero->attacked($myOrc->getDamage());
            $myHero->moreRage();
            echo 'Un Orc vous a infligé ' . $myOrc->getDamage() . ' points d\'attaque <br>';
            if ($myOrc->getDamage() > $myHero->getShieldValue()) {
                $ptsAbs = $myHero->getShieldValue();
                $ptsHealth = abs($myHero->getShieldValue() - $myOrc->getDamage());
            } else {
                $ptsAbs = $myHero->getShieldValue() - $myOrc->getDamage();
                $ptsHealth = 0;
            }
            echo 'Votre armure a absorbé ' . $ptsAbs . ' points d\'attaque.<br>';
            echo 'vous avez perdu ' . $ptsHealth . ' points de vie.<br>';
            $heroHealth = ($myHero->getHealth() > 0) ? $myHero->getHealth() : 0;
            echo 'Il reste ' . $heroHealth . ' points de vie à votre Héro. <br>';
            echo 'Votre Héro a maintenant ' . $myHero->getRage() . ' points de rage ! <br>';
        ?>
        </p>
        <p>
        <?php
            if ($myHero->getRage() >= 100 && $myHero->getHealth() > 0) {
                $myOrc->setHealth($myOrc->getHealth() - $myHero->getWeaponDamage());
                $myHero->setRage(0);
                echo 'Votre Héro est enragé et inflige ' . $myHero->getWeaponDamage() . ' points de vie à l\'abominable Orc des neiges ! <br>';
                $orcHealth = ($myOrc->getHealth() > 0) ? $myOrc->getHealth() : 0;
                echo 'L\'abominable Orc des neiges a maintenant ' . $orcHealth . ' points de vie.<br>';
            }
        ?>
        <p>
        <?php
            }
            echo '<p>';
            if ($myHero->getHealth() <= 0) {
                echo 'Votre Hero est mort courageusement au combat ! <br>';
            }
            if ($myOrc->getHealth() <= 0) {
                echo 'Votre Hero a vaincu l\'abominable orc des neiges ! <br>';
            }
        ?>
        <p>
    </div>

    <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>