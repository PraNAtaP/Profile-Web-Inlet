<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lab Member</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Add Lab Member</h1>
        <form action="/admin/crud/lab_members/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Position</label>
                <input type="text" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
                <label for="kontak">Contact</label>
                <input type="text" id="kontak" name="kontak">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="foto">Photo</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>