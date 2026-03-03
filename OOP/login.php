<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0">Welcome Back</h4>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <form action="server.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="login_email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" name="login_pass" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit"
                            name='btn-login' 
                            class="btn btn-success w-100 py-2">Sign In</button>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <a href="register.php">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'bootstrapJs.php'; ?>
</body>
</html>