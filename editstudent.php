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
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
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

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 100px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .modal-button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
        }

        .modal-button:hover {
            background-color: #c82333;
        }

        .cancel-button {
            background-color: #28a745;
        }

        .cancel-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <!-- Existing Topbar Code -->

    <!-- Navbar Start -->
    <!-- Existing Navbar Code -->

    <!-- Search Bar Start -->
    <!-- Existing Search Bar Code -->

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
                        <a href="javascript:void(0);" class="btn btn-delete btn-sm" title="Delete" onclick="openModal(<?= $course['id'] ?>)">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Courses Table End -->

    <!-- Modal Popup -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>Are you sure you want to delete this course?</h3>
            <button id="confirmDelete" class="modal-button">Yes, Delete</button>
            <button id="cancelDelete" class="modal-button cancel-button">Cancel</button>
        </div>
    </div>

    <script>
        let courseIdToDelete = null;

        // Open the modal and store the course ID to delete
        function openModal(courseId) {
            courseIdToDelete = courseId;
            document.getElementById('deleteModal').style.display = "block";
        }

        // Confirm delete
        document.getElementById('confirmDelete').onclick = function() {
            if (courseIdToDelete) {
                window.location.href = '?delete_id=' + courseIdToDelete; // Redirect to delete the course
            }
        };

        // Close modal on cancel
        document.getElementById('cancelDelete').onclick = function() {
            document.getElementById('deleteModal').style.display = "none";
        };

        // Close modal if clicked outside of it
        window.onclick = function(event) {
            if (event.target == document.getElementById('deleteModal')) {
                document.getElementById('deleteModal').style.display = "none";
            }
        };
    </script>
</body>
</html>
