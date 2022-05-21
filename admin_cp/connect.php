<?php
$dsn = 'mysql:host=localhost;dbname=admin_project';
$user = 'root';
$option = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
    $pdo = new PDO($dsn,$user,'',$option);
    // echo 'successfully connected';    
}

catch(PDOException $e){
    echo 'Failed to connect';
}



