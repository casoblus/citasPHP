<?php
class CDate {
   function __construct( $cust, $empl, $dat, $serv ) {
      $this->cust_Id    = $cust;
      $this->empl_Id    = $empl;
      $this->dateOfService = $dat;
      $this->service    = $serv;
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
   function search() {}
}
