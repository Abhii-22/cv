<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["selected_template"] = $_POST["template"]; // Store selected template
    header("Location: create_cv.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose CV Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f4f4;
        }
        .template-card {
            border: 2px solid transparent;
            transition: 0.3s;
            cursor: pointer;
        }
        .template-card:hover, .template-card.selected {
            border-color: #2ebf91;
            box-shadow: 0 0 10px rgba(46, 191, 145, 0.5);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Choose Your CV Template</h2>
    <form method="POST">
        <div class="row">
            <!-- Template 1 -->
            <div class="col-md-4">
                <label>
                    <input type="radio" name="template" value="template1" required hidden>
                    <div class="card template-card p-3 text-center">
                        <img src="templates/template1_preview.jpg" alt="Template 1" class="img-fluid">
                        <p class="mt-2">Professional Template</p>
                    </div>
                </label>
            </div>

            <!-- Template 2 -->
            <div class="col-md-4">
                <label>
                    <input type="radio" name="template" value="template2" required hidden>
                    <div class="card template-card p-3 text-center">
                        <img src="templates/template2_preview.jpg" alt="Template 2" class="img-fluid">
                        <p class="mt-2">Modern Template</p>
                    </div>
                </label>
            </div>

            <!-- Template 3 -->
            <div class="col-md-4">
                <label>
                    <input type="radio" name="template" value="template3" required hidden>
                    <div class="card template-card p-3 text-center">
                        <img src="templates/template3_preview.jpg" alt="Template 3" class="img-fluid">
                        <p class="mt-2">Creative Template</p>
                    </div>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 w-100">Continue</button>
    </form>
</div>

<script>
    document.querySelectorAll('.template-card').forEach(card => {
        card.addEventListener('click', function () {
            document.querySelectorAll('.template-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            this.querySelector('input').checked = true;
        });
    });
</script>

</body>
</html>
