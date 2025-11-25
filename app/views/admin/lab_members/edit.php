<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lab Member</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Edit Lab Member</h1>
        <form action="/admin/crud/lab_members/update/<?php echo $lab_member['id_anggota']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" id="nama" name="nama" value="<?php echo $lab_member['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Position</label>
                <input type="text" id="jabatan" name="jabatan" value="<?php echo $lab_member['jabatan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kontak">Contact</label>
                <input type="text" id="kontak" name="kontak" value="<?php echo $lab_member['kontak']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $lab_member['email']; ?>">
            </div>
            <div class="form-group">
                <label for="foto">Photo (leave empty to keep current photo)</label>
                <input type="file" id="foto" name="foto">
                <img src="/../../public/uploads/<?php echo $lab_member['foto']; ?>" width="100">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>