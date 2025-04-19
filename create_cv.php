<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["cv_data"] = $_POST;

    if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] == 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $file_name = basename($_FILES["profile_photo"]["name"]);
        $target_file = $upload_dir . time() . "_" . $file_name;

        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            $_SESSION["cv_data"]["profile_photo"] = $target_file;
        } else {
            $_SESSION["cv_data"]["profile_photo"] = "default_profile.png";
        }
    } else {
        $_SESSION["cv_data"]["profile_photo"] = "default_profile.png";
    }

    $_SESSION["selected_template"] = $_POST["template"] ?? "modern_1";

    header("Location: generate_cv.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
    --primary-color: #4e54c8;
    --primary-gradient: linear-gradient(135deg, #4e54c8, #8f94fb);
    --secondary-color:rgb(34, 44, 227);
    --text-color: #2d3436;
    --background-color:rgba(214, 221, 216, 0.89);
    --muted-color:rgb(20, 163, 215);
    --light-bg: rgba(63, 61, 53, 0.51);
    --shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    --glass-blur: blur(12px);
    --border-radius: 16px;
    --transition: all 0.3s ease;
}

body {
    background: var(--background-color);
    font-family: 'Poppins', sans-serif;
    color: var(--text-color);
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

.container {
    background: var(--light-bg);
    backdrop-filter: var(--glass-blur);
    -webkit-backdrop-filter: var(--glass-blur);
    padding: 3rem;
    margin: 4rem auto;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    max-width: 1100px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    animation: fadeInUp 0.8s ease forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    font-weight: 700;
    font-size: 2.4rem;
    margin-bottom: 2.5rem;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
}

.form-label {
    font-weight: 600;
    font-size: 1.05rem;
    margin-top: 1.2rem;
    color: var(--text-color);
    display: block;
    margin-bottom: 0.5rem;
}

.form-control {
    border-radius: var(--border-radius);
    padding: 14px 18px;
    border: none;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: inset 0 0 0 2px #dfe6e9;
    font-size: 1rem;
    transition: var(--transition);
}

.form-control:focus {
    box-shadow: 0 0 0 4px rgba(142, 148, 251, 0.3);
    border: none;
    outline: none;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.btn-primary {
    background: var(--primary-gradient);
    color: #fff;
    border: none;
    font-weight: 600;
    font-size: 1rem;
    padding: 0.85rem 1.8rem;
    border-radius: var(--border-radius);
    transition: var(--transition);
    letter-spacing: 0.6px;
    margin-top: 1.5rem;
    box-shadow: 0 6px 20px rgba(142, 148, 251, 0.3);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(142, 148, 251, 0.4);
    cursor: pointer;
}

.profile-photo {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid var(--secondary-color);
    transition: var(--transition);
    margin-bottom: 1rem;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.profile-photo:hover {
    transform: scale(1.1);
}

.template-preview {
    border: 2px solid #dfe6e9;
    border-radius: var(--border-radius);
    opacity: 0.8;
    transition: var(--transition);
    cursor: pointer;
    max-width: 100%;
    height: auto;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.template-preview:hover {
    transform: scale(1.05);
    opacity: 1;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

input[type="radio"]:checked + img.template-preview {
    border: 3px solid var(--primary-color);
    opacity: 1;
    transform: scale(1.07);
}

.category-label {
    display: block;
    cursor: pointer;
    font-weight: 600;
    color: var(--muted-color);
    margin-top: 1.2rem;
    transition: var(--transition);
    font-size: 1.05rem;
}

.category-label:hover {
    color: var(--primary-color);
}

.sub-templates {
    margin-top: 2rem;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

.hidden {
    display: none;
}

@media screen and (max-width: 768px) {
    .container {
        padding: 2rem 1.5rem;
        margin: 2rem 1rem;
    }

    h2 {
        font-size: 1.8rem;
    }

    .btn-primary {
        width: 100%;
    }
}


        /* Template Selection Styles */
        .template-category {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .template-category:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .template-category img {
            border-radius: 15px;
            transition: transform 0.3s ease;
            filter: brightness(0.9);
        }
        .template-category:hover img {
            transform: scale(1.1);
            filter: brightness(1);
        }
        .template-category p {
            font-weight: 600;
            color: var(--text-color);
            transition: color 0.3s ease;
        }
        .template-category:hover p {
            color: var(--primary-color);
        }
        .template-category::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(52, 152, 219, 0.1), rgba(46, 204, 113, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }
        .template-category:hover::before {
            opacity: 1;
        }
        .sub-templates {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        .template-selection-container {
            perspective: 1000px;
        }
        .template-radio {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .template-radio:checked + img {
            transform: scale(1.05) rotateY(10deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border: 4px solid var(--primary-color);
        }
    </style>
    <script>
        function toggleSubTemplates(category) {
            document.querySelectorAll('.sub-templates').forEach(div => {
                div.classList.add('hidden');
                div.style.opacity = '0';
            });
            const targetDiv = document.getElementById(category);
            targetDiv.classList.remove('hidden');
            setTimeout(() => {
                targetDiv.style.opacity = '1';
            }, 50);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const categoryLabels = document.querySelectorAll('.category-label');
            categoryLabels.forEach(label => {
                label.addEventListener('click', function() {
                    categoryLabels.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const profilePhotoInput = document.querySelector('input[name="profile_photo"]');
            const profilePhotoPreview = document.createElement('img');
            profilePhotoPreview.classList.add('profile-photo', 'mt-2');
            profilePhotoPreview.style.display = 'none';

            profilePhotoInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePhotoPreview.src = e.target.result;
                        profilePhotoPreview.style.display = 'block';
                        event.target.parentNode.insertBefore(profilePhotoPreview, event.target.nextSibling);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Create Your CV</h2>
    <form action="create_cv.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Full Name:</label>
                <input type="text" name="full_name" class="form-control" required>

                <label class="form-label mt-2">Email:</label>
                <input type="email" name="email" class="form-control" required>

                <label class="form-label mt-2">Phone:</label>
                <input type="text" name="phone" class="form-control" required>

                <label class="form-label mt-2">Address:</label>
                <input type="text" name="address" class="form-control" required>

                <label class="form-label mt-2">Profile Photo:</label>
                <input type="file" name="profile_photo" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label mt-2">Professional Summary:</label>
                <textarea name="summary" class="form-control" required></textarea>

                <label class="form-label mt-2">Skills:</label>
                <textarea name="skills" class="form-control" required></textarea>

                <label class="form-label mt-2">Education:</label>
                <textarea name="education" class="form-control" required></textarea>

                <label class="form-label mt-2">Work Experience:</label>
                <textarea name="experience" class="form-control" required></textarea>

                <label class="form-label mt-2">Strengths:</label>
                <textarea name="strengths" class="form-control" required></textarea>

                <label class="form-label mt-2">Projects:</label>
                <textarea name="projects" class="form-control" required></textarea>
            </div>
        </div>

        <label class="form-label mt-3">Select CV Template:</label>
        <div class="row template-selection-container">
            <div class="col-4 text-center">
                <label onclick="toggleSubTemplates('modern')" class="category-label template-category">
                    <img src="templates/images/modern_category.png" alt="Modern Templates" class="img-thumbnail template-preview">
                    <p>Modern</p>
                </label>
            </div>
            <div class="col-4 text-center">
                <label onclick="toggleSubTemplates('classic')" class="category-label template-category">
                    <img src="templates/images/classic_category.png" alt="Classic Templates" class="img-thumbnail template-preview">
                    <p>Classic</p>
                </label>
            </div>
            <div class="col-4 text-center">
                <label onclick="toggleSubTemplates('professional')" class="category-label template-category">
                    <img src="templates/images/professional_category.png" alt="Professional Templates" class="img-thumbnail template-preview">
                    <p>Professional</p>
                </label>
            </div>
        </div>

        <div id="modern" class="sub-templates hidden mt-3">
            <div class="row">
                <?php
                $modern_templates = ["modern_1", "modern_2", "modern_3","modern_4","modern_5","modern_6"];
                foreach ($modern_templates as $template) {
                    echo '<div class="col-4 text-center">';
                    echo '<label>';
                    echo '<input type="radio" name="template" value="' . $template . '" class="template-radio" hidden>';
                    echo '<img src="templates/images/' . $template . '.png" class="img-thumbnail template-preview">';
                    echo '<p>' . ucfirst(str_replace('_', ' ', $template)) . '</p>';
                    echo '</label>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div id="classic" class="sub-templates hidden mt-3">
            <div class="row">
                <?php
                $classic_templates = ["classic_1", "classic_2", "classic_3","classic_4","classic_5"];
                foreach ($classic_templates as $template) {
                    echo '<div class="col-4 text-center">';
                    echo '<label>';
                    echo '<input type="radio" name="template" value="' . $template . '" class="template-radio" hidden>';
                    echo '<img src="templates/images/' . $template . '.png" class="img-thumbnail template-preview">';
                    echo '<p>' . ucfirst(str_replace('_', ' ', $template)) . '</p>';
                    echo '</label>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div id="professional" class="sub-templates hidden mt-3">
            <div class="row">
                <?php
                $professional_templates = ["professional_1", "professional_2", "professional_3", "professional_4", "professional_5"];
                foreach ($professional_templates as $template) {
                    echo '<div class="col-4 text-center">';
                    echo '<label>';
                    echo '<input type="radio" name="template" value="' . $template . '" class="template-radio" hidden>';
                    echo '<img src="templates/images/' . $template . '.png" class="img-thumbnail template-preview">';
                    echo '<p>' . ucfirst(str_replace('_', ' ', $template)) . '</p>';
                    echo '</label>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-4 w-100">Generate CV</button>
</form>
</div>
</body>
</html>