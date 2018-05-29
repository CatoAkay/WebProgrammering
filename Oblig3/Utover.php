<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 16:52
 */

class Utover extends Person {

    protected $nasjonalitet;
    public $Ovelse;

    public function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $nasjonalitet, $Ovelse){
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr);
        $this->nasjonalitet = $nasjonalitet;
        $this->Ovelse = $Ovelse;
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