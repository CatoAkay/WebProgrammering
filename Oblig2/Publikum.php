<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 16:48
 */

class Publikum extends Person {

    protected $bilett;

    function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $Ovelse, $bilett){
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $Ovelse);
        $this->bilett = $bilett;
    }

    public function setBilett($bilett){
        $this->bilett = $bilett;
    }

    public function getBilett(){
        return $this->bilett;
    }

    public function toString()
    {
        return "Du har valgt biletten: ".$this->bilett.parent::toString();
    }
}