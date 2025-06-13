<?php
include 'connection.php';

// Initialize variables to store form data and errors
$course_id = $course_name = $course_code = $course_duration = '';
$success_message = $error_message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data and sanitize it
    $course_id = trim($_POST['course_id']);
    $course_name = trim($_POST['course_name']);
    $course_code = trim($_POST['course_code']);
    $course_duration = trim($_POST['course_duration']);

    // Validate that the required fields are not empty
    if (empty($course_id) || empty($course_name) || empty($course_code) || empty($course_duration)) {
        $error_message = "Course ID, Course Name, Course Code, and Course Duration are required.";
    } else {
        // Prepare the SQL query using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE courses SET course_name = ?, course_code = ?, course_duration = ?, created_at = NOW() WHERE id = ?");
        $stmt->bind_param("sssi", $course_name, $course_code, $course_duration, $course_id);

        if ($stmt->execute()) {
            $success_message = "Course updated successfully!";
            // Clear the form inputs after successful update
            $course_id = $course_name = $course_code = $course_duration = '';
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course - SRMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
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
                            <a href="editcourse.php" class="dropdown-item">Edit Courses</a>
                            <a href="enrollcourse.php" class="dropdown-item">Enroll in Course</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Students</a>
                        <div class="dropdown-menu m-0">
                            <a href="student_profile.php" class="dropdown-item">View Students</a>
                            <a href="student_records.php" class="dropdown-item">Edit Students</a>
                        </div>
                    </div>
                </div>
                <!-- Logout Button -->
                <form method="post" action="logout.php">
                    <button type="submit" class="btn btn-primary py-2 px-4 d-none d-lg-block mr-2">Logout</button>
                </form>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h1 class="text-primary mb-0">SRMS</h1>
                <p class="text-muted mb-0">Update Course Details</p>
            </div>
            
            <!-- Display Success or Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php elseif (!empty($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <!-- Form Action points to the same page (update_course.php) -->
            <form action="update_course.php" method="POST">
                <div class="mb-3">
                    <input type="number" name="course_id" class="form-control" placeholder="Course ID" value="<?php echo $course_id; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="course_name" class="form-control" placeholder="Course Name" value="<?php echo $course_name; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="course_code" class="form-control" placeholder="Course Code" value="<?php echo $course_code; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="course_duration" class="form-control" placeholder="Course Duration" value="<?php echo $course_duration; ?>" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary w-100">Update Course</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
