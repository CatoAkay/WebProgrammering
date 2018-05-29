<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 16:48
 */

class Publikum extends Person {

    protected $bilett;
    protected $brukernavn;
    protected $passord;

    function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $brukernavn, $passord){
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr);
        $this->brukernavn = $brukernavn;
        $this->passord = password_hash($passord, PASSWORD_DEFAULT);
    }

    public function setBilett($bilett){
        $this->bilett = $bilett;
    }

    public function setBrukernavn($brukernavn){
        $this->brukernavn = $brukernavn;
    }

    public function setPassword($passord){
        $this->passord = password_hash($passord, PASSWORD_DEFAULT);
    }

    public function getBrukernavn(){
        return $this->brukernavn;
}

    public function getPassord(){
        return $this->passord;
    }

    public function getBilett(){
        return $this->bilett;
    }

    public function toString()
    {
        return "Ditt brukernavn er: ".$this->getBrukernavn().parent::toString();
    }
}