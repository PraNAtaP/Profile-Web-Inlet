<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Research</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Manage Research</h1>
        <a href="/admin/crud/research/create">Add New Research</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Researcher</th>
                    <th>Publication Date</th>
                    <th>Document</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($researches as $research): ?>
                    <tr>
                        <td><?php echo $research['id_riset']; ?></td>
                        <td><?php echo $research['judul_riset']; ?></td>
                        <td><?php echo substr($research['deskripsi'], 0, 100); ?>...</td>
                        <td><?php echo $research['peneliti']; ?></td>
                        <td><?php echo $research['tanggal_publikasi']; ?></td>
                        <td><a href="/../../public/uploads/<?php echo $research['file_dokumen']; ?>" target="_blank">View Document</a></td>
                        <td>
                            <a href="/admin/crud/research/edit/<?php echo $research['id_riset']; ?>">Edit</a>
                            <a href="/admin/crud/research/delete/<?php echo $research['id_riset']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>