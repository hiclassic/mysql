<?php
$db = mysqli_connect('localhost', 'root', '', 'admin');

if (isset($_POST['submit'])) {
  $n = trim($_POST['sname']);
  $a = intval($_POST['sage']);
  $e = trim($_POST['semail']);
  $c = trim($_POST['scontact']);

  // Call Stored Procedure
  $db->query("CALL call_users('$n','$a','$e','$c')");

  // Redirect after insert
  header('Location: view.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Insert User (Procedure)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
      <h2 class="text-success">📌 Add User (Procedure)</h2>
      <a href="view.php" class="btn btn-secondary">
        <i class="bi bi-table"></i> View Users
      </a>
    </div>

    <div class="card shadow">
      <div class="card-header bg-success text-white">
        <h4>Insert New User with Stored Procedure</h4>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="sname" class="form-control" placeholder="Enter name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="sage" class="form-control" placeholder="Enter age" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="semail" class="form-control" placeholder="Enter email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="scontact" class="form-control" placeholder="Enter contact number" required>
          </div>

          <button type="submit" name="submit" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Insert
          </button>
          <a href="view.php" class="btn btn-secondary">
            Back
          </a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
