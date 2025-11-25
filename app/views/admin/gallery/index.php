<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Manage Gallery</h1>
        <a href="/admin/crud/gallery/create">Add New Item</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($galleries as $gallery): ?>
                    <tr>
                        <td><?php echo $gallery['id_galeri']; ?></td>
                        <td><?php echo $gallery['judul']; ?></td>
                        <td><?php echo $gallery['deskripsi']; ?></td>
                        <td><img src="/../../public/uploads/<?php echo $gallery['foto']; ?>" width="100"></td>
                        <td>
                            <a href="/admin/crud/gallery/edit/<?php echo $gallery['id_galeri']; ?>">Edit</a>
                            <a href="/admin/crud/gallery/delete/<?php echo $gallery['id_galeri']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>