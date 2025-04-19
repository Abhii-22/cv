<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVritti - CV Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/each.jpg') no-repeat center center/cover;
            color: white;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
        }
        .hero-section {
           
            background: url('images/each.jpg') no-repeat center center/cover;
            height: 100vh;
            color: red;
            font-family: 'Poppins', sans-serif;
}

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero-content h1 {
            font-size: 4rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff7eb3, #ff758c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-custom {
            font-size: 1.3rem;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            border: none;
            color: white;
        }
        .btn-primary:hover {
            transform: scale(1.1);
            box-shadow: 0px 0px 15px rgba(255, 117, 140, 0.8);
        }
        .features-section {
            padding: 80px 0;
            text-align: center;
        }
        .feature-box {
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0px 0px 15px rgba(255, 117, 140, 0.8);
        }
        .about-section, .contact-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            text-align: center;
            margin: 40px;
        }
        .footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">TechVritti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary btn-custom text-white" href="register.php">Get Started</a></li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Hero Section -->
<div class="hero-section" style="background-image: url('images/each.jpg'); background-size: cover; background-position: center; height: 100vh;">
    <div class="hero-overlay"></div>
    <div class="hero-content text-center">
        <h1 class="hero-title">TechVritti</h1>
        <p class="hero-subtitle">Build Your Professional Resume with Ease</p>
        <a href="register.php" class="btn btn-primary btn-custom">Get Started</a>
        <a href="login.php" class="btn btn-outline-light btn-custom">Login</a>
    </div>
</div>


<style>
    .hero-section {
    position: relative;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Transparent dark overlay */
}

.hero-content {
    position: relative;
    z-index: 2;
    padding: 40px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
}


    .hero-title {
        font-size: 3.5rem;
        font-weight: bold;
        background: linear-gradient(45deg, #ff7eb3, #ff758c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #fff;
    }

    .btn-custom {
        font-size: 1.2rem;
        padding: 12px 25px;
        border-radius: 50px;
        transition: all 0.3s ease;
        margin: 10px;
    }

    .btn-primary {
        background: linear-gradient(45deg, #ff758c, #ff7eb3);
        border: none;
        color: white;
    }

    .btn-primary:hover {
        transform: scale(1.1);
        box-shadow: 0px 0px 10px rgba(255, 117, 140, 0.8);
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #ff758c;
    }
</style>




    <!-- Features Section -->
   <!-- Features Section -->
<section class="features-section container">
    <h2 class="text-center mb-5">Why Choose TechVritti?</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box">
                <h3>📝 AI-Powered Resume Suggestions</h3>
                <p>Enhance your resume with AI-driven content recommendations.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>📊 Resume Tracking & Analytics</h3>
                <p>Monitor how many recruiters view your resume in real-time.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>📄 Multiple Resume Formats</h3>
                <p>Download your resume in PDF, DOCX, or TXT format with ease.</p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="feature-box">
                <h3>⚡ One-Click Apply</h3>
                <p>Apply directly to job portals with your resume in just one click.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>👀 Live Resume Preview</h3>
                <p>See real-time updates while editing your resume.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>🌗 Dark & Light Mode</h3>
                <p>Switch between light and dark modes for a better user experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- CSS for Feature Section -->
<style>
    .features-section {
        padding: 80px 0;
        text-align: center;
    }
    .feature-box {
        padding: 30px;
        border-radius: 15px;
        background: rgba(10, 24, 216, 0.1);
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease;
    }
    .feature-box:hover {
        transform: translateY(-10px);
        box-shadow: 0px 0px 15px rgba(255, 117, 140, 0.8);
    }
</style>

       <!-- About Section -->
<section class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-md-6 text-center">
    <div class="image-container">
        <img src="images/abhi.jpg" alt="About TechVritti" class="img-fluid about-image">
    </div>
</div>

            
            <!-- Right Side: Content -->
            <div class="col-md-6">
                <h2 class="display-5 fw-bold text-gradient">About TechVritti</h2>
                <p class="lead text-muted">We empower professionals to create high-quality, modern resumes effortlessly. Our platform ensures a smooth, user-friendly experience, enabling you to stand out in the job market.</p>
                <ul class="list-unstyled mt-3">
                    <li>✔ User-Friendly Resume Builder</li>
                    <li>✔ Professionally Designed Templates</li>
                    <li>✔ Instant Download & Editing</li>
                    <li>✔ 24/7 Customer Support</li>
                </ul>
                
            </div>
        </div>
    </div>
</section>

    <style>
        /* About Section Styling */
        .about-section {
    background: linear-gradient(to right,rgb(145, 138, 138),rgb(221, 174, 174));
    padding: 80px 0;
}

.text-gradient {
    background: linear-gradient(45deg,rgb(31, 12, 16),rgb(21, 6, 13));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.list-unstyled li {
    font-size: 1.1rem;
    font-weight: 500;
    color: #444;
    margin-bottom: 10px;
}

.btn-primary {
    background: linear-gradient(45deg, #ff758c, #ff7eb3);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0px 0px 10px rgba(255, 117, 140, 0.8);
}
.image-container {
    position: relative;
    z-index: 2;
}

.about-image {
    width: 80%;
    border-radius: 15px;
    box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease-in-out;
}

.about-image:hover {
    transform: scale(1.05);
}


    /* Contact Section Styling */
    .contact-section {
            padding: 80px 0;
            background: url('https://source.unsplash.com/1600x900/?contact,office') no-repeat center center/cover;
            color: white;
            position: relative;
        }
        
        .contact-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        
        .contact-section .container {
            position: relative;
            z-index: 2;
        }

        .contact-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-box:hover {
            transform: translateY(-5px);
            box-shadow: 0px 0px 15px rgba(255, 117, 140, 0.8);
        }

        .contact-box h4 {
            color: #ff758c;
            margin-bottom: 10px;
        }

        .contact-form .form-input {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            padding: 12px;
            color: white;
        }

        .contact-form .form-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .contact-form .btn-custom {
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: white;
            font-size: 1.2rem;
            padding: 12px 25px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .contact-form .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0px 0px 10px rgba(255, 117, 140, 0.8);
        }
    </style>
<!-- Contact Section -->
<section id="contact" class="contact-section">
        <div class="container text-center">
            <h2 class="mb-5">Get in Touch</h2>
            <p>Have any questions? Feel free to reach out to us!</p>

            <div class="row text-start">
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                        <p>TechVritti, Pune, India</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4><i class="fas fa-envelope"></i> Email</h4>
                        <p><a href="mailto:support@techvritti.com">support@techvritti.com</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4><i class="fas fa-phone"></i> Phone</h4>
                        <p><a href="tel:+919876543210">+91 98765 43210</a></p>
                    </div>
                </div>
            </div>

        
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-white">
        &copy; 2025 TechVritti. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
