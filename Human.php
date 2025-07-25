<!-- Human.php -->

<?php

include_once "Player.php";

class Human extends Player{

    function getAttackValue(){

        if(rand(0,99) < 20){
            return $this->getStrength()*3;
        }
        return $this->strength;
    }

    function attack($value){
        if(rand(0,99) < 33){
            return "$this->name evades.";
        }
        $this->health -= $value;
        return "$this->name lost $value health.";
    }
}
?>