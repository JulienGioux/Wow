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
    <title>WoW Alpha_0.01</title>
</head>
<body>
    <div>
        <p>
            <?php $myHero = new Hero(2000, 0, 'excalibure', 250, 'Le bouclier d\'Achille', 600);?>
        </p>
        <p>
            <?php $myOrc = new Orc(2500, 0);?>  
        </p>
        <?php
            while ($myHero->getHealth() > 0 && $myOrc->getHealth() > 0) {
                echo '<p>';
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
                echo 'Il reste ' . $myHero->getHealth() . ' points de vie à votre Héro. <br>';
                echo 'Votre Héro a maintenant ' . $myHero->getRage() . ' points de rage ! <br>';
                echo '</p>';
                if ($myHero->getRage() >= 100) {
                    $myOrc->setHealth($myOrc->getHealth() - $myHero->getWeaponDamage());
                    $myHero->setRage(0);
                    echo 'Votre Héro est enragé et inflige ' . $myHero->getWeaponDamage() . ' points de vie à l\'abominable Orc des neiges ! <br>';
                    echo 'L\'abominable Orc des neiges a maintenant ' . $myOrc->getHealth() . ' points de vie.';
                }
            }
            if ($myHero->getHealth() <= 0) {
                echo 'Votre Hero est mort courageusement au combat ! <br>';
            }
            if ($myOrc->getHealth() <= 0) {
                echo 'Votre Hero a vaincu l\'abominable orc des neiges ! <br>';
            }
        ?>
    </div>
</body>
</html>