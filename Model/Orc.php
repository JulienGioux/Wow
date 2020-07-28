<?php

/**
 * 
 */
class Orc extends Character {

    private $damage;

    /**
     * Default constructor
     */
    public function __construct($healthVal, $rageVal) {
        parent::__construct($healthVal, $rageVal);
        echo 'Vous venez de créer un Orc :<br>';
        echo 'Points de vie : ' . $this->getHealth() . '<br>';
        echo 'Points de rage : ' . $this->getRage() . '<br>';
    }

    public function getDamage() {
        return $this->damage;
    }

    public function setDamage($damageVal) {
        return $this->damage = $damageVal;
    }

    public function attack() {
        return $this->damage = random_int(600, 800);       
    }

}