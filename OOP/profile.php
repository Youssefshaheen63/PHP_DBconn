<?php
require_once "Database.php";
require_once "User.php";
require "navbar.php";

$db = Database::getInstance()->getConnection();
$userObj = new User($db);

$userId = $_GET['id'] ?? ($_SESSION['loginId'] ?? null);

if(!$userId){
  header("location:login.php?message=Please login first");
  exit;
}

$user = $userObj->find($userId);
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


