<?php 
require "connection.php";
require "navbar.php";

$id = $_GET['id'];
$query = $conn->prepare("select * from users where id = ?");
$query->execute([$id]);
$user = $query->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 500px;">
        <h3>Update User</h3>
        <form action="server.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <button type="submit" name="btn-update" class="btn btn-success w-100">Update User</button>
        </form>
    </div>
</div>