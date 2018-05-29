<?php
/**
 *Oblig 1
 * Cato Hilmi Akay
 * s326326
 */

class bestilling{

    private $bilett;
    private $antall;
    private $dato;
    private $klokke;
    private $kunde;

    function __construct($bilett, $antall, $dato, $klokke, $kunde){
        $this->bilett = $bilett;
        $this->antall = $antall;
        $this->dato = $dato;
        $this->klokke = $klokke;
        $this->kunde = $kunde;
    }

    public function getBilett(){
        return $this->bilett;
    }

    public function getAntall(){
        return $this->antall;
    }

    public function getDato(){
        return $this->dato;
    }

    public function getKlokke(){
        return $this->klokke;
    }

    public function getKunde(){
        return $this->kunde;
    }

    public function toString(){
        return $this->klokke."<br/>".$this->dato."<br/><br/>".
            "Navn: ".$this->kunde->getNavn()."<br/>".
            "Adresses: ".$this->kunde->getAdresse()."<br/>".
            "E-post: ".$this->kunde->getEpost()."<br/>".
            "Mobil: ".$this->kunde->getMobil()."<br/>".
            "Du har valgt å se filmen: ".$this->bilett."<br/>".
            "Antall biletter: ".$this->antall;
    }
    public function toString2(){
        return "------------------------\n".$this->klokke."\n".$this->dato."\n\n".
            "Navn: ".$this->kunde->getNavn()."\n".
            "Adresses: ".$this->kunde->getAdresse()."\n".
            "E-post: ".$this->kunde->getEpost()."\n".
            "Mobil: ".$this->kunde->getMobil()."\n".
            "Du har valgt å se filmen: ".$this->bilett."\n".
            "Antall biletter: ".$this->antall."\n\n\n";
    }

}