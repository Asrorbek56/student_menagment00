<?php 
session_start();
if (!isset($_SESSION['user_id'])){
 header("Location: auth/login.php");
 exit();
}
?>
<h1>WELCOME <?= $_SESSION['username']; ?> </h1>
<a href="students/index.php">students</a>;
<a href="auth/logout.php">logout</a>