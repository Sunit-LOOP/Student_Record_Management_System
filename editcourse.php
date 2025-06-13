<?php
include 'connection.php';

// Handle Course Actions (Create, Update, Delete)
$action = $_GET['action'] ?? '';

// For Read Action (this will get all the courses)
$result = $conn->query("SELECT * FROM courses");
$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

// Handle Search functionality
if ($action == 'search') {
    $query = $_GET['query'];
    $stmt = $conn->prepare("SELECT * FROM `courses` WHERE `course_name` LIKE ? OR `course_code` LIKE ?");
    $search_term = "%$query%";
    $stmt->bind_param('ss', $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    $stmt->close();
}

// Handle Delete functionality
if ($action == 'delete') {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM `courses` WHERE `id` = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page to reflect changes
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SRMS-Student Record Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/updated_style.css" rel="stylesheet">

    <style>
        /* Customize icon colors */
        .btn-edit i {
            color: #28a745; /* Green color for Edit */
        }

        .btn-delete i {
            color: #dc3545; /* Red color for Delete */
        }

        .btn-edit:hover i {
            color: #218838; /* Darker green on hover */
        }

        .btn-delete:hover i {
            color: #c82333; /* Darker red on hover */
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
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
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
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <a href="course.html" class="nav-item nav-link">Notice</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Courses</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.html" class="dropdown-item">Edit  Courses</a>
                            <a href="feature.html" class="dropdown-item">Enroll in Course</a>
                        </div>
                    </div>
                    <!-- Student Dropdown Start -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Students</a>
                        <div class="dropdown-menu m-0">
                            <a href="student_profile.php" class="dropdown-item">View Students</a>
                            <a href="student_records.php" class="dropdown-item">Edit Students</a>
                            
                        </div>
                    </div>
                    <!-- Student Dropdown End -->
                </div>
                <!-- Logout Button -->
<form method="post" action="logout.php">
    <button type="submit" class="btn btn-primary py-2 px-4 d-none d-lg-block mr-2">Logout</button>
</form>

                </form>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Search Bar Start -->
    <div class="container mt-5">
        <form method="GET" action="" class="d-flex justify-content-left">
            <input type="text" name="query" class="form-control w-50" placeholder="Search by Course Name or Code">
            <button type="submit" name="action" value="search" class="btn btn-primary ml-2">
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>
    <!-- Search Bar End -->

    <!-- Courses Table Start -->
    <div class="container mt-5">
        <h2 class="text-center">Courses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Course Duration</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course['id'] ?></td>
                    <td><?= $course['course_name'] ?></td>
                    <td><?= $course['course_code'] ?></td>
                    <td><?= $course['course_duration'] ?></td>
                    <td><?= $course['created_at'] ?></td>
                    <td>
                        <!-- Edit Button (Icon with color) -->
                        <a href="updatecourse.php?id=<?= $course['id'] ?>" class="btn btn-edit btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Button (Icon with color) -->
                        <a href="deletecourse.php?id=<?= $course['id'] ?>" class="btn btn-delete btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this course?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Courses Table End -->

</body>
</html>
