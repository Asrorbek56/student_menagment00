<?php
 session_start();
require "../config/db.php";
if(!isset($_SESSION['user_id'])){
    header("location: auth/login.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=?";
$data =$conn->prepare($sql);
$data->execute([$id]);
$students =$data->fetch();

//agar students topilmasa

if(!$students){
    echo "student topilmadi!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            backdrop-filter: blur(5px);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .save {
            background: #28a745;
            color: white;
        }

        .cancel {
            background: #dc3545;
            color: white;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Student</h2>

    <form action="update.php" method="POST">
        <input type="hidden" name= "id" value="<?= $students['id'] ?>">
        <div class="input-box"></div>
        <label>Full Name</label>
        <input type="text"name = "full_name" value="<?= $students['full_name']?>" required>

        <label>Age</label>
        <input type="number" name = "age"  value="<?= $students['age']?> " required>

        <label>Class</label>
        <input type="text" name = "class_name" value="<?= $students['class_name']?>" required>

        <label>Phone</label>
        <input type="number" name="phone_number" value="<?= $students['phone_number'] ?>" required>

        <label>Address</label>
        <input type="text"name = "adrees" value="<?= $students['adrees']?> "required>

        <label>Created At</label>
        <input type="date" name = "created_at" required>

        <button  type="submit" class="btn save" >Saqlash</a></button>
        <button type="button" class="btn cancel">Bekor qilish</button>
    </form>
</div>

</body>
</html>