<?php
require "connection.php";
require "navbar.php";

if(!isset($_SESSION['loginId'])){
  header("location:login.php?message=Please login first");
  exit;
}

$query = $conn->prepare('select * from users where id=?');
$query->execute([$_SESSION['loginId']]);
$user = $query->fetch(PDO::FETCH_ASSOC);
?>
<div class="container mt-5 text-center">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h5>Welcome, <?= htmlspecialchars($user['name']) ?></h5>
            <p><?= htmlspecialchars($user['email']) ?></p>
            <a href="allUsers.php" class="btn btn-primary">Show Users</a>
        </div>
    </div>
</div>


