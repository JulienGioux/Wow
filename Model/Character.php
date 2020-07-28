<?php

/**
 * 
 */
class Character {

    /**
     * 
     */
    private $health;

    /**
     * 
     */
    private $rage;

    /**
     * Default constructor
     */
    public function __construct($healthVal, $rageVal) {
        $this->health = $healthVal;
        $this->rage = $rageVal;
    }


    /**
     * 
     */
    public function __destruct() {
        // TODO implement here
    }
// GETTERS
    public function getHealth() {
       return $this->health;
    }
    public function getRage() {
        return $this->rage;
    }
// SETTERS
    public function setHealth($healthVal) {
        return $this->health = $healthVal;
    }
    public function setRage($rageVal) {
        return $this->rage = $rageVal;
    }
}