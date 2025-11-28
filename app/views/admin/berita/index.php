<?php
// Mengasumsikan $data['judul'] dan $data['berita'] akan dilewatkan dari controller
$page_title = isset($data['judul']) ? $data['judul'] : 'Kelola Berita';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin: 0 2px;
            color: white;
        }

        .btn-add {
            background-color: #28a745;
            /* Hijau */
            float: right;
            margin-bottom: 20px;
        }

        .btn-edit {
            background-color: #ffc107;
            /* Kuning */
            color: #212529;
        }

        .btn-delete {
            background-color: #dc3545;
            /* Merah */
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            /* Warna soft */
            font-weight: 600;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Kelola Berita</h1>

        <div class="clearfix">
            <a href="<?= BASEURL; ?>/berita/tambah" class="btn btn-add">Tambah Berita</a>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th>Judul</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data['berita']) && !empty($data['berita'])): ?>
                        <?php foreach ($data['berita'] as $key => $berita): ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= htmlspecialchars($berita['judul']); ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/berita/edit/<?= $berita['id_berita']; ?>" class="btn btn-edit">Edit</a>

                                    <a href="<?= BASEURL; ?>/berita/hapus/<?= $berita['id_berita']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Tidak ada data berita.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>