<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Manage Admins</h1>
        <a href="/admin/crud/admins/create">Add New Admin</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin['id_admin']; ?></td>
                        <td><?php echo $admin['nama']; ?></td>
                        <td><?php echo $admin['email']; ?></td>
                        <td><?php echo $admin['username']; ?></td>
                        <td>
                            <a href="/admin/crud/admins/edit/<?php echo $admin['id_admin']; ?>">Edit</a>
                            <a href="/admin/crud/admins/delete/<?php echo $admin['id_admin']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>