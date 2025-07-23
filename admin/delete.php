<?php
$db = mysqli_connect('localhost', 'root', '', 'admin');

if (isset($_GET['deleteid'])) {
  $delete_id = intval($_GET['deleteid']);

  // OPTIONAL: Prepared Statement (not a must for simple int)
  $stmt = mysqli_prepare($db, "DELETE FROM users WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $delete_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header('Location: view.php');
  exit;
} else {
  // Direct Access Protection
  header('Location: view.php');
  exit;
}
?>
