<?php

/**
 * 
 */
class Hero extends Character {

    /**
     * 
     */
    private $weapon;
    private $weaponDamage;
    private $shield;
    private $shieldValue;

    /**
     * Default constructor
     */
    public function __construct($healthVal, $rageVal, $weaponVal, $weaponDamageVal, $shieldName, $shieldVal) {
        parent::__construct($healthVal, $rageVal);
        $this->weapon = $weaponVal;
        $this->weaponDamage = $weaponDamageVal;
        $this->shield = $shieldName;
        $this->shieldValue = $shieldVal;
        echo 'Vous venez de créer un Héro :<br>';
        echo 'Points de vie : ' . $this->getHealth() . '<br>';
        echo 'Points de rage : ' . $this->getRage() . '<br>';
        echo 'Arme : ' . $this->weapon . '<br>';
        echo 'Dégat attaque : ' . $this->weaponDamage . '<br>';
        echo 'Bouclier : ' . $this->shield . '<br>';
        echo 'Points armure : ' . $this->shieldValue . '<br>';
    }
// GETTERS
    public function getWeapon() {
        return $this->weapon;
    }
    public function getWeaponDamage() {
        return $this->weaponDamage;
    }
    public function getShield() {
        return $this->shield;
    }
    public function getShieldValue() {
        return $this->shieldValue;
    }
// SETTERS
    public function setWeapon($weaponVal) {
        return $this->weapon = $weaponVal;
    }
    public function setWeaponDamage($weaponDamageVal) {
        return $this->weaponDamage = $weaponDamageVal;
    }
    public function setShield($shieldName) {
        return $this->shield = $shieldName;
    }
    public function setShieldValue($shieldVal) {
        return $this->shieldValue = $shieldVal;
    }

// METHODS

    public function attacked ($attackVal) {
        $this->setHealth($this->getHealth() - ($attackVal - $this->shieldValue));
    }
    public function moreRage () {
        $this->setRage($this->getRage()+30);
    }




}