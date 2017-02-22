<?php
class CDate {
   function __construct() {
      $super::__construct($fn,$ln,$bd,$g);
   }   
   function createTable() {
      global $db;
      $db->query('CREATE TABLE IF NOT EXISTS date(
         cust_id INT AUTO_INCREMENT PRIMARY KEY,
         cdat_custId INT NOT NULL,
         cdat_EmplId INT NOT NULL,
         cdat_date DATE,
         cdat_service VARCHAR(10)
      )');
   }
   function add() {}
   function get() {}
   function search(){}
}
