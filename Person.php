<?php 

class Person {
   /*$firstName;
   $lastName;
   $birthDate;
   $gender;*/
   public function __construct( $firstName, $lastName, $birthDate, $gender ) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->birthDate = $birthDate;
      $this->gender = $gender;
   }
}
