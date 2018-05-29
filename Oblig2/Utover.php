<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 16:52
 */

class Utover extends Person {

    protected $nasjonalitet;

    function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $Ovelse, $nasjonalitet){
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $Ovelse);
        $this->nasjonalitet = $nasjonalitet;
    }

    public function getNasjonalitet(){
        return $this->nasjonalitet;
    }

    public function setNasjonalitet($nasjonalitet){
        $this->nasjonalitet = $nasjonalitet;
    }

    public function toString()
    {
        return "Nasjonaliteten din er: ".$this->nasjonalitet.parent::toString();
    }





}