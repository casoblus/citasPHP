<?php
class Employee extends Person {
   
   function __construct() {
      $super::__construct($fn,$ln,$bd,$g);
   }

   function createTable() {
      global $db; // Carga variable global
         $db->query('CREATE TABLE IF NOT EXISTS employee(
         empl_id INT AUTO_INCREMENT PRIMARY KEY,
         empl_fNname VARCHAR(50),
         empl_lName VARCHAR(50),
         empl_bDate DATE,
         empl_gender VARCHAR(10)
      )');
   }
   function add() {}
   function get() {}
   function search(){}
}
