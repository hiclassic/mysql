<?php
// DB connection
$conn = mysqli_connect('localhost', 'root', '', 'admin');

if (!$conn) {
    // Optional: log error to file, but no output
    exit;
}

// Show data if ID is set
if (isset($_GET['id'])) {
    $getid = intval($_GET['id']); // sanitize to int

    // Use prepared statement
    $stmt = mysqli_prepare($conn, "SELECT id, name, age, email, contact FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $getid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $email = $row['email'];
        $contact = $row['contact'];
    } else {
        // If no user, exit silently
        exit;
    }
    mysqli_stmt_close($stmt);
}

// Handle update
if (isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $age = intval($_POST['age']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);

    // Use prepared update
    $stmt = mysqli_prepare($conn, "UPDATE users SET name = ?, age = ?, email = ?, contact = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sissi", $name, $age, $email, $contact, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect silently on success
    header('Location: delete.php');
    exit;
}
?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 pt-4 mt-4 border border-success">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                Name:<br>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>"><br><br>
                Age:<br>
                <input type="text" name="age" value="<?php echo htmlspecialchars($age ?? ''); ?>"><br><br>
                Email:<br>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>"><br><br>
                Contact:<br>
                <input type="text" name="contact" value="<?php echo htmlspecialchars($contact ?? ''); ?>"><br><br>
                <input type="text" name="id" value="<?php echo htmlspecialchars($id ?? ''); ?>" readonly><br><br>
                <input type="submit" name="edit" value="Edit" class="btn btn-success">
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
