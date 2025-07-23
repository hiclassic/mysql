<?php
$db = mysqli_connect('localhost', 'root', '', 'admin');
if (isset($_POST['submit'])) {
  $n = trim($_POST['sname']);
  $a = intval($_POST['sage']);
  $e = trim($_POST['semail']);
  $c = trim($_POST['scontact']);
  $db->query("INSERT INTO users(name, age, email, contact) VALUES ('$n','$a','$e','$c')");
  header('location:view.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="card shadow">
      <div class="card-header bg-success text-white">
        <h4>Add New User</h4>
      </div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="sname" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="sage" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="semail" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="scontact" class="form-control" required>
          </div>
          <button type="submit" name="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Save
          </button>
          <a href="view.php" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
