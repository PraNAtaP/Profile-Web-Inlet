<?php
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Your role is: <?php echo $role; ?></p>

        <nav>
            <ul>
                <?php if ($role === 'super_admin'): ?>
                    <li><a href="/admin/crud/admins">Manage Admins</a></li>
                <?php endif; ?>
                <li><a href="/admin/crud/gallery">Manage Gallery</a></li>
                <li><a href="/admin/crud/news">Manage News</a></li>
                <li><a href="/admin/crud/lab_members">Manage Lab Members</a></li>
                <li><a href="/admin/crud/research">Manage Research</a></li>
                <li><a href="/admin/forms">View Submitted Forms</a></li>
                <li><a href="/admin/logout">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>