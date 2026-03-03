<?php
  require "connection.php";
  require "navbar.php";
  $users = $conn->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);
?>



<div class="container mt-5">
    <h2 class="mb-4">All Users</h2>
    <div class="row g-4">
        <?php foreach ($users as $u): ?>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($u['name']) ?></h5>
                    <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($u['email']) ?></p>
                </div>
                <div class="card-footer d-flex justify-content-center gap-2 bg-white">
                    <a href="profile.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm px-3">Show</a>
                    <a href="update.php?id=<?= $u['id'] ?>" class="btn btn-primary btn-sm px-3">Edit</a>
                    <a href="server.php?deleteId=<?= $u['id'] ?>" class="btn btn-danger btn-sm px-3">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>