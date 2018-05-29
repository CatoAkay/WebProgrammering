<?php
/**
 * Created by PhpStorm.
 * User: catoh
 * Date: 28.02.2018
 * Time: 17:11
 */

class Hondterer{

    public $conn;
    public $input;

    public function tilkobligTest(){
        $this->conn = mysqli_connect("localhost", "root", "", "vm_ski");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else {
            echo "Våre systemer er oppe å går!<br/>";
            mysqli_set_charset($this->conn, "utf8");
        }

    }

    public function getConn(){
        return $this->conn;
    }

    public function insert($obj, $rolle){
        $Ovelse = $obj->Ovelse;
        $datotid = $Ovelse->getDato() . " " . $Ovelse->getKlokke();

        if ($rolle == "Utøver") {
            $verdi = $obj->getNasjonalitet();
            $kolonne = "Nasjonalitet";
            $table = "utøver";
        }
    elseif ($rolle == "Publikum") {
            $verdi = $obj->getBilett();
            $kolonne = "Biletttype";
            $table = "publikum";
        }


        $sql = "INSERT INTO person (Fornavn, Etternavn, Adresse, Postnr, Poststed, Telefonnr)";
        $sql .= "VALUES ('" . $obj->getFornavn() . "', '" . $obj->getEtternavn() . "' ,'" . $obj->getAdresse()."','". $obj->getPostnr()."','". $obj->getPoststed()."',". $obj->getTelefonnr().");";
        mysqli_query($this->conn, $sql);
        $personid = mysqli_insert_id($this->conn);

        $sql2 = "INSERT INTO $table(person_PersonID,$kolonne)";
        $sql2 .= "VALUES ($personid, '$verdi');";
        mysqli_query($this->conn, $sql2);

        $sql3 = "SELECT ØvelseID FROM øvelse WHERE Type = '".$Ovelse->getType()."';";
        $resultat = mysqli_query($this->conn, $sql3);
        $row = mysqli_fetch_assoc($resultat);
        $ovelseid = $row["ØvelseID"];

        $sql4 = "INSERT INTO øvelse_has_person(øvelse_ØvelseID, person_PersonID)";
        $sql4 .= "VALUES (".$ovelseid.",".$personid.");";
        mysqli_query($this->conn, $sql4);
    }

    public function brukernavnLedig($brukernavn){
        $sql = "SELECT * FROM Person WHERE Brukernavn = '". $brukernavn."';";
        mysqli_query($this->conn,$sql);
        if (mysqli_affected_rows($this->conn) != 0) {
            return false;
        }else{
            return true;
            }
        }

    public function insertPub($obj){
        $sql = "INSERT INTO person (Fornavn, Etternavn, Brukernavn, Passord, Adresse, Postnr, Poststed, Telefonnr)";
        $sql .= "VALUES ('" . $obj->getFornavn() . "', '" . $obj->getEtternavn() . "' ,'".$obj->getBrukernavn()."' ,'".$obj->getPassord()."' ,'" . $obj->getAdresse()."','". $obj->getPostnr()."','". $obj->getPoststed()."',". $obj->getTelefonnr().");";
        mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1){
            return true;
        }else{
            return false;
        }

    }
}
