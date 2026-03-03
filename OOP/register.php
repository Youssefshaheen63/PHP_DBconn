<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <?php include 'bootstrapCss.php'; ?>
</head>
<body class="bg-light">
    <?php include 'navbar.php';
        if (isset($_GET["message"])) {
        echo "<p class='alert alert-success w-57 text-center'>" . $_GET["message"] . "</p>";
    }
    ?>
 <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0">Create Account</h4>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <form action="server.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                            </div>
                            <button type="submit" 
                            name='btn-register'
                            class="btn btn-success w-100 py-2">Register Now</button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <small>Already have an account? <a href="login.php">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'bootstrapJs.php'; ?>
</body>
</html>