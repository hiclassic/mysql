<?php
require_once 'conn.php';

$sql = "SELECT * FROM clients";
$stmt = $pdo->query($sql);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Client List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Client List</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Created At</th>
        </tr>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= htmlspecialchars($client['id']) ?></td>
            <td><?= htmlspecialchars($client['name']) ?></td>
            <td><?= htmlspecialchars($client['email']) ?></td>
            <td><?= htmlspecialchars($client['phone']) ?></td>
            <td><?= htmlspecialchars($client['created_at']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
