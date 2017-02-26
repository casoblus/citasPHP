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
   /**
    * Recibe el id de la cita 
    * Devuelve los datos de la cita si existe
    */
   function get( $recordId ) {
      global $db;

      $sqlRequest = 'SELECT * FROM customer WHERE cust_id '.$recordId; 
      if( ( $sqlResult = $db->query( $sqlRequest ) ) === false ) {
         return false;
      }
      return $sqlResult;
   }
   
   
   
   
   /**
    * Obtiene lista de ids de citas que concuerden con 
    * los parametros pasados como argumentos
    */
   function searchBy( $field, $condition, $value ){
      switch ($condition) {
         case 'contains':
            $strWhere = $field.'=\'%'.$value.'%\'';
            break;
         case 'equals':
            $strWhere = $field.'=\''.$value.'\'';
            break;
         case 'lessOrEquals':
            $strWhere = $field.'<=\''.$value.'\'';
            break;
         case 'greatOrEquals':
            $strWhere = $field.'>=\''.$value.'\'';
            break;
         case 'lessThan':
            $strWhere = $field.'<\''.$value.'\'';
            break;
         case 'greatThan':
            $strWhere = $field.'>\''.$value.'\'';
            break;
      }
      $sqlRequest = 'SELECT cust_id FROM customer WHERE '.$strWhere; 
      if( ( $sqlResult = $db->query( $sqlRequest ) ) === false ) {
         return false;
      }
      return $sqlResult;
   }


   function __toString() {
     $str = " 
      $this->cust_id<br>
      $this->empl_Id<br>
      $this->dateOfService<br>
      $this->service<br>";
   }
}
