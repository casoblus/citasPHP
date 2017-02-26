<?php

list ( $host, $user, $pass, $dbName ) = ['localhost', 'root', 'dbadmin', 'citas'];

$db = new mysqli( $host, $user, $pass );
if ($db->connect_error) {
   printf('Connect failed: %s\r\n',$db->connect_error);
   exit();
}

$this->$db->query( 'CREATE DATABASE IF NOT EXISTS '.$dbName );
if ($db->error) {
   printf('Create failed: %s\r\n',$db->error);
   exit();
}

$db->query( 'USE '.$dbName );

var_dump( $db->query('SHOW TABLES') );

include 'Person.php'; // Ver autocarga de clases en php
include 'Customer.php';
include 'Employee.php';

Customer::createTable();
Employee::createTable();

if(isset($_POST)) {
   switch( $_POST['type'] ) {
   case 'cdate':
      switch ($_POST['submit']) {
         case 'add':
            $oDate = new CDate($params);
            break;
         case 'delete':
            CDate::delete( $recordId );
            break;
         case 'update':
            $
            break;
         case 'find':
            break;
      }
      break;
   case 'customer':
      break;
   case 'employee': 
      break;
   default:
      break;
   }
}

if( isset($_GET['nuevoCliente']) ){
   include ('nuevo_cliente_form.html');
}
else if ( isset($_GET['nuevoEmpleado']) ) {
   include ('nuevo_empleado_form.html');
}
else if ( isset($_GET['nuevaCita'])) {
   include ('nueva_cita_form.html')
}
