<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

require_once "db_connect.php";

$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT * FROM cvs WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CVs - CV Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(to right, #8360c3, #2ebf91);
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .btn-action {
            margin: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center text-white">My CVs</h2>
    <a href="create_cv.php" class="btn btn-success mb-3">+ Create New CV</a>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-6">
                <div class="card mb-3 p-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row["full_name"]); ?></h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row["email"]); ?></p>
                        <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($row["phone"]); ?></p>
                        <p class="card-text"><strong>Skills:</strong> <?php echo htmlspecialchars($row["skills"]); ?></p>
                        <a href="view_cv.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-action">View</a>
                        <a href="edit_cv.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-action">Edit</a>
                        <a href="delete_cv.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-action" onclick="return confirm('Are you sure?');">Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
