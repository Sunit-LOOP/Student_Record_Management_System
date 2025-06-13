<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SRMS - Contact Us</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Contact Page" name="keywords">
    <meta content="Contact Page" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="css/updated_style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .separator {
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, #2878EB, #17a2b8);
            margin: 0;
        }
    </style>


</head>

<body>
      <!-- Topbar Start -->
      <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>9843922230</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>Studentrecords@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white px-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="text-white px-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-white px-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="text-white pl-2" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <img src="img/a.png" alt="Logo" class="img-fluid">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="loginpage.php" class="nav-item nav-link">Courses</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="loginpage.php" class="dropdown-item">Course Detail</a>
                            <a href="loginpage.php" class="dropdown-item">Our Features</a>
                            <a href="loginpage.php" class="dropdown-item">Instructors</a>
                            <a href="loginpage.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="loginpage.php" class="btn btn-primary py-2 px-4 d-none d-lg-block mr-2">Login</a>
                <a href="register.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Register</a>
            </div>
        </nav>
    </div>

    <div class="separator"></div>
    

    <!-- Main Content -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">Gausala, Orchid International College</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">9843922230</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">Studentrecords@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Add footer content here -->
        <div class="container-fluid bg-dark text-white-50 py-5">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <img src="img/a.png" alt="Logo" class="img-fluid">
                    </a>
                    <p class="m-0">
                        A Student Record Management System is a tool that helps manage student data such as personal details, attendance, grades, and academic records in a structured and efficient way. It ensures easy access and reduces manual effort.</p>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Info</h3>
                    <div>
                        <p><i class="fa fa-angle-right mr-2"></i>Privacy Policy</p>
                        <p><i class="fa fa-angle-right mr-2"></i>Terms & Condition</p>
                        <p><i class="fa fa-angle-right mr-2"></i>FAQs</p>
                        <p><i class="fa fa-angle-right mr-2"></i>Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
