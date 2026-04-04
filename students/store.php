<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['user_id'])){
 header("Location: ../auth/login.php");
 exit();
}

$full_name = $_POST['full_name'];
$age = $_POST['age'];
$class = $_POST['class_name'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$created_at = $_POST['created_at'];


 $sql = "INSERT INTO students (full_name,age,class_name,phone_number,adrees)
     VALUES(?,?,?,?,?)" ;

$data = $conn->prepare($sql);
$data->execute([$full_name,$age,$class,$phone,$adress]);
 header("location:index.php");
 exit();