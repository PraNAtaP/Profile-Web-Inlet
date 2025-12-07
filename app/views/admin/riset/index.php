<style>
    .container-fluid {
        padding: 2rem;
    }
    .table-container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .table-title h2 {
        margin: 0;
        font-size: 1.8rem;
        color: #333;
    }
    .btn-add {
        background-color: #007bff;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    .btn-add:hover {
        background-color: #0056b3;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 1rem;
        border-bottom: 1px solid #dee2e6;
        text-align: left;
        vertical-align: middle;
    }
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
    }
    .table tbody tr:hover {
        background-color: #f1f1f1;
    }
    .action-links a {
        color: #007bff;
        text-decoration: none;
        margin-right: 10px;
        padding: 5px 8px;
        border: 1px solid transparent;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    .action-links a.edit {
        color: #28a745;
    }
    .action-links a.edit:hover {
        background-color: #eaf6ec;
        border-color: #28a745;
    }
    .action-links a.delete {
        color: #dc3545;
    }
    .action-links a.delete:hover {
        background-color: #fbebed;
        border-color: #dc3545;
    }
    .action-links a.download {
        color: #17a2b8;
    }
    .action-links a.download:hover {
        background-color: #e8f6f8;
        border-color: #17a2b8;
    }
</style>

<div class="container-fluid">
    <div class="table-container">
        <div class="table-title">
            <h2>Manajemen Riset</h2>
            <a href="<?= BASEURL; ?>/riset/tambah" class="btn-add">Tambah Riset</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%;">Thumbnail</th>
                    <th>Judul Riset</th>
                    <th>Link YouTube</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data['riset'] as $riset) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <img src="<?= BASEURL; ?>/img/riset/<?= htmlspecialchars($riset['file_dokumen']); ?>" alt="Thumbnail" style="width: 100px; border-radius: 5px;">
                    </td>
                    <td><?= htmlspecialchars($riset['judul_riset']); ?></td>
                    <td>
                        <a href="<?= htmlspecialchars($riset['video_embed']); ?>" target="_blank">
                            <?= htmlspecialchars($riset['video_embed']); ?>
                        </a>
                    </td>
                    <td class="action-links">
                        <a href="<?= BASEURL; ?>/riset/edit/<?= $riset['id_riset']; ?>" class="edit">Edit</a>
                        <a href="<?= BASEURL; ?>/riset/hapus/<?= $riset['id_riset']; ?>" class="delete" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
