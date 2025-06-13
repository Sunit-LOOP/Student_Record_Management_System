<?php
include 'connection.php';

// Initialize variables to store form data and errors
$username = $password = $email = $phone_number = $age = $address = '';
$success_message = $error_message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data and sanitize it
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $age = isset($_POST['age']) ? (int)$_POST['age'] : NULL;
    $address = trim($_POST['address']);

    // Validate that the required fields are not empty
    if (empty($username) || empty($password) || empty($email)) {
        $error_message = "Username, Password, and Email are required.";
    } else {
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format.";
        }
        // Validate phone number (optional, adjust as needed)
        elseif (!empty($phone_number) && !preg_match("/^[0-9]{10}$/", $phone_number)) {
            $error_message = "Invalid phone number format.";
        }
        // Validate age (optional, adjust as needed)
        elseif (!empty($age) && ($age < 18 || $age > 45)) {
            $error_message = "Age must be between 18 and 45.";
        } else {
            // Check if email already exists
            $check_email_stmt = $conn->prepare("SELECT email FROM students WHERE email = ?");
            $check_email_stmt->bind_param("s", $email);
            $check_email_stmt->execute();
            $check_email_stmt->store_result();

            if ($check_email_stmt->num_rows > 0) {
                $error_message = "Email already exists. Please use a different email.";
            } else {
                // Hash the password for security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Prepare the SQL query using prepared statements to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO students (Username, password, email, phone_number, age, address) 
                                        VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $username, $hashed_password, $email, $phone_number, $age, $address);

                if ($stmt->execute()) {
                    $success_message = "Registration successful!";
                    // Clear the form inputs after successful registration
                    $username = $password = $email = $phone_number = $age = $address = '';
                } else {
                    $error_message = "Error: " . $stmt->error;
                }
                $stmt->close();
            }

            $check_email_stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SRMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="logo">
        <a href="index.php">
        <img src="img/a.png" alt="Logo">
</a>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 60px);">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h1 class="text-primary mb-0">SRMS</h1>
                <p class="text-muted mb-0">Create your account</p>
            </div>
            
            <!-- Display Success or Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php elseif (!empty($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <!-- Form Action points to the same page (register.php) -->
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="<?php echo $phone_number; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="number" name="age" class="form-control" placeholder="Age" min="18" value="<?php echo $age; ?>" required>
                </div>
                <div class="mb-3">
                    <textarea name="address" class="form-control" placeholder="Address" rows="3" required><?php echo $address; ?></textarea>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
                <div class="text-center">
                    <p>Already have an account? <a href="loginpage.php" class="text-decoration-none">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
