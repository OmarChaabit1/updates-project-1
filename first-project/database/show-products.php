<?php
    include('cnx.php');

    $table_name = $_SESSION['table'];
    
    $stmt = $cnx->prepare("SELECT * FROM $table_name ORDER BY created_at DESC  ");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
   
    


?>