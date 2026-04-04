<?php session_start() ?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            /* TUNGI OCEAN BACKGROUND */
            background: url('https://images.unsplash.com/photo-1500375592092-40eb2168fd21') no-repeat center center/cover;
        }

        /* QORONG'I OVERLAY */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 30, 0.6);
            top: 0;
            left: 0;
        }

        .login-box {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 15px;
            width: 300px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            text-align: center;
            color: white;
        }

        .login-box h2 {
            margin-bottom: 20px;
        }

        .input-box {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #0a84ff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #0066cc;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Kirish</h2>
    <form action="login_process.php" method="POST">
        <div class="input-box">
            <label>Username</label>
            <input name="username" type="text" placeholder="Username kiriting">
        </div>

        <div class="input-box">
            <label>Password</label>
            <input name="password" type="password" placeholder="Password kiriting">
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
    <?php
    if(isset($_GET['error'])){
     echo '<p style="color:red;">loginyoki parol hato!</p>';
    }
    ?>
</div>

</body>
</html>