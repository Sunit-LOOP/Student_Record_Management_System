<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SRMS - Student Record Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/updated_style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #0056b3;
            color: #fff;
            position: fixed;
            width: 240px;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background-color: #003d80;
        }

        .sidebar .active {
            background-color: #004a99;
        }

        .content {
            margin-left: 30px;
            padding: 20px;
        }

        .table thead th {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>

<body>
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
                    <a href="index.html" class="nav-item nav-link active">Home</a>
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
                <a href="loginpage.php" class="btn btn-primary py-2 px-4 d-none d-lg-block mr-2">Logout</a>
                
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
   

    <!-- Content Area -->
    <div class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Important Notices</h3>
                <button class="btn btn-primary">Upload</button>
            </div>

            <!-- Notice Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin</td>
                        <td>PhD Viva of Ms. Poonam S. Jaiswal (Biotechnology)</td>
                        <td>Yesterday</td>
                        <td>00:00 PM</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Placement Office</td>
                        <td>Webstaff Co. Ltd: Submission of bio-data for pre-final year students</td>
                        <td>Yesterday</td>
                        <td>00:00 PM</td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
