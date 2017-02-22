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
   function add() {}
   function get() {}
   function search(){}
}
