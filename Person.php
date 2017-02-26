<?php 

class Person {

   public function __construct( $firstName, $lastName, $birthDate, $gender ) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->birthDate = $birthDate;
      $this->gender = $gender;
   }
   
   
   
   function __toString(){
      $str = " 
      $this->firstName<br>
      $this->lastName<br>
      $this->birthDate<br>
      $this->gender<br>";
      
      return $str;
   }
}
