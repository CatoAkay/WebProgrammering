<?php
/**
 *Oblig 1
 * Cato Hilmi Akay
 * s326326
 */


class kunde{
private $navn;
private $adresse;
private $mobil;
private $epost;

    function __construct($navn, $adresse, $mobil, $epost){
    $this->navn = $navn;
    $this->adresse = $adresse;
    $this->mobil = $mobil;
    $this->epost = $epost;
    }

    public function getNavn(){
        return $this->navn;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getMobil(){
        return $this->mobil;
    }

    public function getEpost(){
        return $this->epost;
    }
}