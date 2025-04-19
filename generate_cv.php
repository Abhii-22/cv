<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION["cv_data"])) {
    echo "<h2>Error: No CV data found.</h2>";
    exit();
}

$cv_data = $_SESSION["cv_data"];
$selected_template = $_SESSION["selected_template"] ?? "modern_template";

// Set default values if missing
$cv_data = array_merge([
    "full_name" => "Your Name",
    "email" => "your.email@example.com",
    "phone" => "000-000-0000",
    "address" => "Your Address",
    "summary" => "Professional summary here...",
    "skills" => "Your skills here...",
    "education" => "Your education details...",
    "experience" => "Your work experience...",
    "certifications" => "Your certifications...",
    "profile_photo" => "default_profile.png"
], $cv_data);

// Path to the selected template
$template_file = "templates/{$selected_template}.php";

// If template file doesn't exist, show error
if (!file_exists($template_file)) {
    echo "<h2>Error: Template file not found - $template_file</h2>";
    exit();
}
?>

<!-- ✅ Print Button (hidden during print) -->
<div id="print-button" style="text-align: right; margin: 20px;">
    <button onclick="window.print()" style="
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    ">🖨️ Print CV</button>
</div>

<!-- ✅ Print-friendly CSS -->
<style>
@media print {
    /* Hide print button */
    #print-button {
        display: none !important;
    }

    /* Hide background colors and simplify layout */
    body {
        background: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* Hide everything except the resume */
    body * {
        visibility: hidden;
    }

    #cv-container, #cv-container * {
        visibility: visible;
    }

    #cv-container {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
}
</style>

<!-- ✅ Start of Resume Content -->
<div id="cv-container">
    <?php include($template_file); ?>
</div>
