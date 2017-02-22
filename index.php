<?php

list ( $host, $user, $pass, $dbName ) = ['localhost', 'root', 'dbadmin', 'citas'];

$db = new mysqli( $host, $user, $pass );
if ($db->connect_error) {
   printf('Connect failed: %s\r\n',$db->connect_error);
   exit();
}

$db->query( 'CREATE DATABASE IF NOT EXISTS '.$dbName );
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
