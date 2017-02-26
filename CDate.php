<?php
class CDate {
   function __construct( $cid, $eid, $dos, $s ) {
      $this->cust_Id = $cid;
      $this->empl_Id = $eid;
      $this->dateOfService = $dos;
      $this->service = $s;
   }   
   function createTable() {
      global $db;
      $db->query('CREATE TABLE IF NOT EXISTS date(
         cdat_id INT AUTO_INCREMENT PRIMARY KEY,
         cdat_custId INT NOT NULL,
         cdat_EmplId INT NOT NULL,
         cdat_date DATE,
         cdat_service VARCHAR(10)
      )');
   }
   
   
   
   /**
    * Guarda una nueva entrada en la base de datos
    */
   function add() {
      global $db;
      $sqlRequest = 'INSERT INTO date( 
         cdat_custId, cdat_EmplId, cdat_date, cdat_service ) 
         VALUES(
            \''.$this->cust_Id.'\'
            ,'.$this->empl_Id.'\'
            ,'.$this->dateOfService.'\'
            ,'.$this->service.'\')';

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

      $sqlRequest = 'SELECT * FROM date WHERE '.$recordId; 
      if( ( $sqlResult = $db->query( $sqlRequest ) ) === false ) {
         return false;
      }
      return $sqlResult;
   }
   
   
   
   
   /**
    * Obtiene lista de ids de citas que concuerden con 
    * los parametros pasados como argumentos
    */
   function searchBy( $field, $condition, $value ) {
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
      $sqlRequest = 'SELECT cdat_Id FROM date WHERE '.$strWhere; 
      if( ( $sqlResult = $db->query( $sqlRequest ) ) === false ) {
         return false;
      }
      return $sqlResult;
   }
}
