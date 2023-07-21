<?php
    $servername = 'localhost'; 
    $username = 'root'; 
    $password = ''; 

//connecting to databse 

    try{
            $cnx = new PDO("mysql:host=$servername;dbname=pos_project", $username, $password);
            // set the POD error mode ro exception
            $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           
        }catch(\Exception $e){
           $error_message =  $e->getMessage();
    }
?>
