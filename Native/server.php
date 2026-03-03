<?php
 require "connection.php";

 if(isset($_POST["btn-register"])){
  $fullName = $_POST['name'];
  $Email = $_POST['email'];
  $password = $_POST['password'];
  

  $namePattern = "/^[a-zA-Z\s]{3,}$/";
  $passwordPattern = "/^[0-9]{8,20}$/";

  if(!preg_match($namePattern , $fullName)){
    header("location:register.php?message=Invalid name must be characters mor e than 3 characters.");
    exit;
  }

  if (!preg_match($passwordPattern, $password)) {
        header("location:register.php?message=Password must be 8-20 length and only numbers");
        exit;
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header("location:register.php?message=Invalid Email");
        exit;
    }


    $checkEmail = $conn->prepare("select email from users where email=?");
    $checkEmail->execute([$Email]);
    if($checkEmail->fetch()){
      header("location:register.php?message=Email already exists");
      exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "insert into users (name , email , password) values (:name, :email, :password)";
    $sql = $conn->prepare($query);
    $sql->execute([':name' => $fullName, ':email' => $Email, ':password' => $hashedPassword]);

    header("location:login.php?message=Registration successful!");
 }


// Login
if(isset($_POST["btn-login"])){
    $email = $_POST['login_email'];
    $pass = $_POST['login_pass'];
    
    $query = $conn->prepare("select * from users where email = ?");
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($pass, $user['password'])){
      $_SESSION['loginId'] = $user['id'];
      header("location:profile.php");
    }else{
      header("location:login.php?message=Invalid User");
    }
}

// delete user
if(isset($_GET["deleteId"])){
   $query = $conn->prepare("delete from users where id = ?");
    $query->execute([$_GET['deleteId']]);
    header("location:allUsers.php?message=delete user done");
    exit;
}

// update
if (isset($_POST["btn-update"])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "update users set name = :name, email = :email where id = :id";
    $query = $conn->prepare($query);
    $query->execute([':name' => $name, ':email' => $email, ':id' => $id]);
    header("location:allUsers.php?message=update user done");
    exit;
}

?>