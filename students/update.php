<?php 
session_start();
require "../config/db.php";
if(!isset($_SESSION['user_id'])){
    header("location: auth/login.php");
    exit();
}

$id =$_POST['id'];
$full_name =$_POST ['full_name'];
$age = $_POST['age'];
$phone_number=$_POST['phone_number'];
$adrees =$_POST['adrees'];
$class_name= $_POST['class_name'];

$sql= "UPDATE students
    SET full_name =?, age=?,phone_number=?,adrees=?,class_name=?
    WHERE id=?";
$data =$conn->prepare($sql);
$data->execute([$full_name,$age,$phone_number,$class_name,$adrees,$id]);

header("Location: index.php");
exit();


?>