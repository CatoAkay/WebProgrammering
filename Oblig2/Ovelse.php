<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 26.02.2018
 * Time: 16:20
 */

class Ovelse{

    public $dato;
    public $klokke;
    public $type;
    public $sted;

    function __construct($dato, $klokke, $type, $sted){
        $this->dato = $dato;
        $this->klokke = $klokke;
        $this->type = $type;
        $this->sted = $sted;

    }

    public function setDato($dato){
        $this->dato = $dato;
    }

    public function setKlokke($klokke){
        $this->klokke = $klokke;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setSted($sted){
        $this->sted = $sted;
    }

    public function getDato(){
        return $this->dato;
    }

    public function getKlokke(){
        return $this->klokke;
    }

    public function getType(){
        return $this->type;
    }

    public function getSted(){
        return $this->sted;
    }
}