<?php
$conn = mysqli_connect('localhost', 'root', '', 'admin');
if (!$conn) { die("DB Connection failed"); }

// Always safe defaults
$id = '';
$name = '';
$age = '';
$email = '';
$contact = '';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $age = $row['age'];
    $email = $row['email'];
    $contact = $row['contact'];
  } else {
    header('Location: view.php');
    exit;
  }

  mysqli_stmt_close($stmt);
} else {
  header('Location: view.php');
  exit;
}

if (isset($_POST['edit'])) {
  $id = intval($_POST['id']);
  $name = trim($_POST['name']);
  $age = intval($_POST['age']);
  $email = trim($_POST['email']);
  $contact = trim($_POST['contact']);

  $stmt = mysqli_prepare($conn, "UPDATE users SET name = ?, age = ?, email = ?, contact = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "sissi", $name, $age, $email, $contact, $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('Location: view.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h4>Edit User</h4>
      </div>
      <div class="card-body">
        <form method="POST">
          <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($age) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($contact) ?>" required>
          </div>
          <button type="submit" name="edit" class="btn btn-primary">
            Save Changes
          </button>
          <a href="view.php" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
