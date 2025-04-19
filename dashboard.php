<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CV Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: url('images/dash.jpg') no-repeat center center/cover;
            height: 100vh;
            color: black;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: rgba(14, 13, 13, 0.8);
            color: white;
            padding-top: 20px;
            transition: 0.3s;
            border-right: 2px solid rgba(255, 255, 255, 0.2);
        }
        .sidebar a {
            padding: 15px;
            display: block;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: rgba(123, 127, 124, 0.2);
            border-left: 4px solid #ff6ec4;
        }
        .content {
            margin-left: 260px;
            padding: 40px;
            text-align: center;
        }
        .card {
            background: rgba(11, 11, 11, 0.15);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
            text-align: center;
            transition: transform 0.3s ease-in-out, background 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            background: rgba(33, 144, 79, 0.42);
        }
        .btn-custom {
            background: linear-gradient(90deg, #ff6ec4, #7873f5);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0px 4px 10px rgba(255, 110, 196, 0.5);
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #ff3e9d, #6251f2);
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(255, 110, 196, 0.8);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center">🦋 CV Builder</h3>
        <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="create_cv.php"><i class="fas fa-file-alt"></i> Create CV</a>
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        <a href="logout.php" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Welcome, <?php echo $user_name; ?> 🦋</h2>
        <p>Manage your CVs and profile settings here.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h4><i class="fas fa-file-alt"></i> Create a New CV</h4>
                    <p>Build a professional CV in minutes.</p>
                    <a href="create_cv.php" class="btn-custom">Get Started</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h4><i class="fas fa-cog"></i> Settings</h4>
                    <p>Update your account details.</p>
                    <a href="settings.php" class="btn-custom">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
