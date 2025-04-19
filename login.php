<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;
            echo "<script>alert('Login successful!'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!');</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CV Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Background with animated gradient */
        body {
            background: url('images/login.jpg') no-repeat center center/cover;
            height: 100vh;
            
        }

        /* Gradient Animation */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glassmorphism effect */
        .card {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(255, 65, 108, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Input fields */
        .form-control {
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            padding: 12px;
            color: white;
            font-size: 16px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.5);
        }

        /* Neon button */
        .btn-custom {
            width: 100%;
            border-radius: 50px;
            padding: 12px;
            background: linear-gradient(90deg, #ff416c, #ff4b2b);
            border: none;
            font-size: 18px;
            font-weight: bold;
            color: white;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(255, 65, 108, 0.5);
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #ff3e9d, #ff542b);
            transform: scale(1.05);
            box-shadow: 0px 6px 20px rgba(255, 65, 108, 0.8);
        }

        /* Login text */
        .text-light a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .text-light a:hover {
            color: #ff416c;
        }

        /* Input icon */
        .icon {
            font-size: 20px;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
        }

        .input-group {
            position: relative;
        }
        
        .input-group input {
            padding-left: 40px;
        }

    </style>
</head>
<body>
    <div class="card">
        <h2 class="mb-4">🔑 Login to Your Account</h2>
        <form method="POST">
            <div class="mb-3 input-group">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3 input-group">
                <span class="icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-custom">Login</button>
            <p class="text-light mt-3">Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>
