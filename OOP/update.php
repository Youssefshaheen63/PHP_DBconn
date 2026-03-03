<?php 
require_once "Database.php";
require_once "User.php";
require "navbar.php";

$db = Database::getInstance()->getConnection();
$userObj = new User($db);
$user = $userObj->find($_GET['id']);
?>
<div class="container mt-5">
    <form action="server.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="text" name="name" class="form-control mb-2" value="<?= $user['name'] ?>">
        <input type="email" name="email" class="form-control mb-2" value="<?= $user['email'] ?>">
        <button type="submit" name="btn-update" class="btn btn-success w-100">Update</button>
    </form>
</div>