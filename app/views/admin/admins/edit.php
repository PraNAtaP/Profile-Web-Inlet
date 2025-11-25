<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Edit Admin</h1>
        <form action="/admin/crud/admins/update/<?php echo $admin['id_admin']; ?>" method="POST">
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" id="nama" name="nama" value="<?php echo $admin['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $admin['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password (leave empty to keep current password)</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>