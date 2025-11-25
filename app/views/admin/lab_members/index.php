<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lab Members</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Manage Lab Members</h1>
        <a href="/admin/crud/lab_members/create">Add New Member</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lab_members as $lab_member): ?>
                    <tr>
                        <td><?php echo $lab_member['id_anggota']; ?></td>
                        <td><?php echo $lab_member['nama']; ?></td>
                        <td><?php echo $lab_member['jabatan']; ?></td>
                        <td><?php echo $lab_member['kontak']; ?></td>
                        <td><?php echo $lab_member['email']; ?></td>
                        <td><img src="/../../public/uploads/<?php echo $lab_member['foto']; ?>" width="100"></td>
                        <td>
                            <a href="/admin/crud/lab_members/edit/<?php echo $lab_member['id_anggota']; ?>">Edit</a>
                            <a href="/admin/crud/lab_members/delete/<?php echo $lab_member['id_anggota']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>