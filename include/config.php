<?php
    $host = "localhost"; 
    $dbname="qlsachbao"; 
    $username = "root"; 
    $password = ""; 
    try{
        $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    }catch(PDOException $e){ 
}

?>