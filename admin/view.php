<?php
$db = mysqli_connect('localhost', 'root', '', 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .table-hover tbody tr:hover { background: #e9ecef; transition: 0.3s; }
    .action-btn { margin-right: 5px; }
    .fade-in { animation: fadeIn 0.5s ease-in; }
    @keyframes fadeIn { from {opacity:0;} to {opacity:1;} }
  </style>
</head>
<body>
  <div class="container py-5 fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="text-success">📋 User Information</h2>
      <a href="insert.php" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add New User
      </a>
    </div>

    <table class="table table-bordered table-hover shadow-sm">
      <thead class="table-success">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $users = $db->query("SELECT * FROM users");
      while($row = $users->fetch_assoc()):
      ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['age']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['contact']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary action-btn">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="delete.php?deleteid=<?= $row['id'] ?>" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure?')">
              <i class="bi bi-trash3-fill"></i>
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
