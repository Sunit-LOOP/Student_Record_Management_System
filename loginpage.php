<?php
// Include the connection file
include 'connection.php';

session_start();

// Initialize error message
$error_message = '';

if (isset($_POST['submit'])) {
    // Get the posted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query to fetch user details from the students table
    $sql = "SELECT * FROM students WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('SQL error: ' . $conn->error);
    }

    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists in the database
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usertype'] = $user['usertype']; 
    
            if ($user['usertype'] == 'admin') {
                header("Location: adminhome.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            // Password is incorrect
            $error_message = "Incorrect password!";
        }
    } else {
        // User not found
        $error_message = "User not found!";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <style>
        /* Hover effect for Forgot Password link */
        .forgot-password:hover {
            color: blue !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="logo-container text-center mb-4">
        <a href="index.php">
        <img src="img/a.png" alt="Logo" style="max-width: 150px;">
    </a>
    </div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h1 class="text-primary mb-0">SRMS</h1>
                <p class="text-muted mb-0"> A central hub for managing records</p>
            </div>
            <form action="" method="POST">
                <!-- Username Field -->
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <!-- Password Field -->
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <!-- Login Button -->
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                </div>

                <!-- Error message display -->
<?php
if (!empty($error_message)) {
    echo "<div class='alert alert-danger text-center'>$error_message</div>";
}
?>


                <!-- Forgot Password and Register -->
                <div class="text-center mb-3">
                    <a href="forgot_password.php" class="text-decoration-none text-secondary forgot-password">Forgot password?</a>
                </div>
                <div class="text-center mb-3">
                    <a href="register.php" class="btn btn-success w-100">Create new account</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
