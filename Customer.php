<?php
class Customer extends Person {
   function __construct() {
      $super::__construct($fn,$ln,$bd,$g);
   }   
   function createTable() {
      global $db;
      $db->query('CREATE TABLE IF NOT EXISTS customer(
         cust_id INT AUTO_INCREMENT PRIMARY KEY,
         cust_fNname VARCHAR(50),
         cust_lName VARCHAR(50),
         cust_bDate DATE,
         cust_gender VARCHAR(10)
      )');
   }
   function add() {
      global $db;
      $sqlRequest = 'INSERT INTO customer( 
         cust_fName, cust_lName, cust_bDate, cust_gender ) 
         VALUES(
            \''.$this->firstName.'\'
            ,'.$this->lastName.'\'
            ,'.$this->birthdate.'\'
            ,'.$this->gender.'\')';

      if( $db->query( $sqlRequest ) === false ) {
         return false;
      }
      return true;
   }
   function get() {}
   function search(){}
}
