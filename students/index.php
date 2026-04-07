<?php 
session_start();
require "../config/db.php";
if(!isset($_SESSION['user_id'])){
    header("location: auth/login.php");
    exit();
}
// sql yozdim

$sql = "SELECT * FROM students ORDER BY id DESC";
$data = $conn->prepare($sql);
$data->execute();
$students = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        h2 {
            margin: 0;
        }

        .add-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-btn:hover {
            opacity: 0.9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .actions button {
            border: none;
            padding: 6px 10px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 4px;
            color: white;
        }

        .view {
            background: #17a2b8;
        }

        .edit {
            background: #ffc107;
            color: black;
        }

        .delete {
            background: #dc3545;
        }

        .actions button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="header" >
    <h2>Students List</h2>
    <button class="add-btn" > <a href="create.php">+ Add Student</a></button> 
    
</div>

<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Age</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($students as $item):?>
            <tr>
            <td><?= $item['full_name'] ?></td>
            <td><?= $item['age'] ?></td>
            <td><?= $item['class_name'] ?></td>
            <td><?= $item['phone_number'] ?></td>
            <td><?= $item['adrees'] ?></td>
            <td><?= date("d.M.Y",strtotime($item['created_at'])) ?></td>
            <td class="actions">
                <button class="view">Ko‘rish</button>
                <button class="edit">O‘zgartirish</button>
                <button class="delete">O‘chirish</button>
            </td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td>Ali Valiyev</td>
            <td>18</td>
            <td>10-A</td>
            <td>+998901234567</td>
            <td>Toshkent</td>
            <td>2026-04-02</td>
            <td class="actions">
                <button class="view">Ko‘rish</button>
                <button class="edit">O‘zgartirish</button>
                <button class="delete">O‘chirish</button>
            </td>
        </tr>
    </tbody>
</table>

</body>
</html>