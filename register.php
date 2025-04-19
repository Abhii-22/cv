<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error! Try again.');</script>";
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
    <title>Register - CV Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Background Animation */
body {
    background: url('images/register.jpg') no-repeat center center/cover;
    height: 100vh;
    animation: gradientBG 6s ease infinite;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Arial', sans-serif;
    color: white;
    overflow: hidden;
}

/* Gradient Animation */
@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Glassmorphism Card */
.card {
    width: 400px;
    padding: 25px;
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    box-shadow: 0px 10px 25px rgba(255, 65, 108, 0.5);
    text-align: center;
    animation: fadeIn 1s ease-in-out;
}

/* Button Styling */
.btn-custom {
    width: 100%;
    border-radius: 50px;
    padding: 12px;
    background: linear-gradient(90deg, #ff758c, #ff7eb3);
    border: 2px solid transparent;
    font-size: 18px;
    font-weight: bold;
    color: white;
    transition: all 0.4s ease-in-out;
    box-shadow: 0px 4px 10px rgba(255, 65, 108, 0.5);
    position: relative;
    overflow: hidden;
}

/* Button Hover Effect */
.btn-custom:hover {
    transform: scale(1.1);
    background: linear-gradient(90deg, #ff4e50, #ff6b81);
    border-color: white;
    box-shadow: 0px 8px 20px rgba(255, 65, 108, 0.8);
}

/* Soft Glow Animation */
@keyframes glowEffect {
    0% { box-shadow: 0px 4px 15px rgba(255, 65, 108, 0.5); }
    50% { box-shadow: 0px 6px 25px rgba(255, 65, 108, 0.7); }
    100% { box-shadow: 0px 4px 15px rgba(255, 65, 108, 0.5); }
}


        .btn-custom:hover {
            animation: pulseGlow 1.5s infinite alternate;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Register</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user"></i> Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom">Register</button>
            <p class="mt-3">Already have an account? <a href="login.php" style="color: yellow;">Login</a></p>
        </form>
    </div>
</body>
</html>
