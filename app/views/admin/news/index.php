<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Manage News</h1>
        <a href="/admin/crud/news/create">Add New Item</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Publication Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $news_item): ?>
                    <tr>
                        <td><?php echo $news_item['id_berita']; ?></td>
                        <td><?php echo $news_item['judul']; ?></td>
                        <td><?php echo substr($news_item['isi'], 0, 100); ?>...</td>
                        <td><?php echo $news_item['tanggal_publikasi']; ?></td>
                        <td>
                            <a href="/admin/crud/news/edit/<?php echo $news_item['id_berita']; ?>">Edit</a>
                            <a href="/admin/crud/news/delete/<?php echo $news_item['id_berita']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>