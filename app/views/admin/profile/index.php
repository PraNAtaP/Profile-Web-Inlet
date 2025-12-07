<style>
    .profile-card {
        max-width: 700px;
        margin: 2rem auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .profile-header {
        background: linear-gradient(135deg, #4a5f8f 0%, #2c3e5f 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        margin: 0 auto 1rem;
        display: block;
        background-color: #e9ecef;
        font-size: 4rem;
        color: #4a5f8f;
    }
    .profile-header h2 {
        margin: 0;
        font-weight: 600;
    }
    .profile-form-container {
        padding: 2rem;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="profile-card">
        <div class="profile-header">
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['admin_name'] ?? 'Admin'); ?>&background=0D8ABC&color=fff" alt="Profile">
            <i class="fas fa-user"></i>
            <h2><?= htmlspecialchars($data['admin']['nama']); ?></h2>
            <p><?= htmlspecialchars($data['admin']['email']); ?></p>
        </div>
        <div class="profile-form-container">
            <h4 class="mb-4">Edit Profil</h4>
            <form action="<?= BASEURL; ?>/profile/update" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['admin']['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($data['admin']['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['admin']['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Ganti Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>