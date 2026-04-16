<?php
session_start();
require "../config/db.php";
if (!isset($_SESSION['user_id'])) {
    header("location: auth/login.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id= ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$students = $data->fetch();


?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Ma'lumotlar</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 20px;
        }

        .card {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .row {
            margin: 10px 0;
            font-size: 16px;
        }

        .label {
            font-weight: bold;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Talaba ma'lumotlari</h2>

        <div class="row"><span class="label">ID:</span> <span id="id"></span></div>
        <div class="row"><span class="label">Ism:</span><?= $students['full_name'] ?> <span id="name"></span></div>
        <div class="row"><span class="label">Yosh:</span><?= $students['age'] ?> <span id="age"></span></div>
        <div class="row"><span class="label">Sinf:</span> <?= $students['class_name'] ?><span id="class"></span></div>
        <div class="row"><span class="label">Telefon:</span><?= $students['phone_number'] ?> <span id="phone"></span></div>
        <div class="row"><span class="label">Address:</span> <?= $students['adrees'] ?><span id="address"></span></div>
        <div class="row"><span class="label">Yaratilgan:</span> <?= $students['created_at'] ?><span id="created"></span></div>

        <a href="../students/index.php">⬅ Orqaga</a>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);

        document.getElementById("id").textContent = params.get("id");
        document.getElementById("name").textContent = params.get("name");
        document.getElementById("age").textContent = params.get("age");
        document.getElementById("class").textContent = params.get("class");
        document.getElementById("phone").textContent = params.get("phone");
        document.getElementById("address").textContent = params.get("address");
        document.getElementById("created").textContent = params.get("created");
    </script>

</body>

</html>