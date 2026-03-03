<?php
require_once "Database.php";
require_once "User.php";

$db = Database::getInstance()->getConnection();
$userObj = new User($db);

if (isset($_POST["btn-register"])) {
    $userObj->register($_POST['name'], $_POST['email'], $_POST['password']);
    header("location:login.php?message=Registered Successfully");
}


if (isset($_POST["btn-login"])) {
    $user = $userObj->login($_POST['login_email'], $_POST['login_pass']);
    if ($user) {
        $_SESSION['loginId'] = $user['id'];
        header("location:profile.php");
    } else {
        header("location:login.php?message=Invalid User");
    }
}


if (isset($_GET["deleteId"])) {
    $userObj->delete($_GET['deleteId']);
    header("location:allUsers.php?message=Deleted Successfully");
}


if (isset($_POST["btn-update"])) {
    $userObj->update($_POST['id'], $_POST['name'], $_POST['email']);
    header("location:allUsers.php?message=Updated Successfully");
}
?>