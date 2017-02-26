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
   function add() {
      global $db;
      $sqlRequest = 'INSERT INTO employee( 
         empl_fName, empl_lName, empl_bDate, empl_gender ) 
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

      $sqlRequest = 'SELECT * FROM employee WHERE cust_id '.$recordId; 
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
      $sqlRequest = 'SELECT cust_id FROM employee WHERE '.$strWhere; 
      if( ( $sqlResult = $db->query( $sqlRequest ) ) === false ) {
         return false;
      }
      return $sqlResult;
   }


}
