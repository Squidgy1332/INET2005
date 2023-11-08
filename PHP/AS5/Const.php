<?php
class Movie {
    public $number;
    public $Name;
    public $Picture;
    public $Director;
    public $MainActor;
    public $Link;
    public $Year;
    public $Genera;
  
    function __construct($Number) {
      $this->number = $Number;
    }

    function set_Picture($Picture){
      $this->Picture = $Picture;
    }

    function set_Name($Name){
      $this->Name = $Name;
    }

    function set_Director($Director){
      $this->Director = $Director;
    }

    function set_MainActor($MainActor){
      $this->MainActor = $MainActor;
    }

    function set_Link($Link){
      $this->Link = $Link;
    }

    function set_Year($Year){
      $this->Year = $Year;
    }

    function set_Genera($Genera){
      $this->Genera = $Genera;
    }

    function get_Number() {
      return $this->number;
    }

    function get_Picture(){
      return $this->Picture;
    }

    function get_Name(){
      return $this->Name;
    }

    function get_Director(){
      return $this->Director;
    }

    function get_MainActor(){
      return $this->MainActor;
    }

    function get_Link(){
      return $this->Link;
    }

    function get_Year(){
      return $this->Year;
    }

    function get_Genera(){
      return $this->Genera;
    }

    function Display(){
      echo $this->get_Name();
      echo $this->get_Picture();
      echo $this->get_Director();
      echo $this->get_MainActor();
      echo $this->get_Link();
      echo $this->get_Year();
      echo $this->get_Genera();
    }

  }
?>