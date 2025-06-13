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
        <img src="img/a.png" alt="Logo" style="max-width: 150px;">
    </div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 15px;">
            <div class="text-center mb-4">
                <h1 class="text-primary mb-0">SRMS</h1>
                <p class="text-muted mb-0"> Admin Login</p>
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
                if (isset($error_message)) {
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

                <!-- Admin Login and Back Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="loginpage.php" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>