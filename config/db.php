<?php
$host='localhost';
$dbname = "members_list";
$username = "root";
$password = "";

 try{
   $conn = new PDO ("mysql:host=$host;dbname=$dbname",$username, $password);
   // xatoliklarni ko`rsatish
   $conn->setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 } catch(  PDOException $e){
    die("xatolik:".$e->getMessage());
 }
