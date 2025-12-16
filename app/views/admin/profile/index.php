<style>
    .content-area {
        padding: 40px 20px;
        background-color: #f1f5f9;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .profile-card {
        width: 100%;
        max-width: 550px;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        position: relative;
    }

    .profile-header {
        background: linear-gradient(135deg, #081f5c 0%, #334eac 100%);
        padding: 50px 30px 40px 30px;
        text-align: center;
        color: white;
    }

    .profile-header img {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        transition: transform 0.3s;
    }

    .profile-header img:hover {
        transform: scale(1.05);
        border-color: #fff;
    }

    .profile-header h2 {
        font-size: 1.6rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: 0.5px;
    }

    .profile-header p {
        font-size: 0.95rem;
        opacity: 0.8;
        margin-top: 5px;
        font-weight: 300;
    }

    .profile-header i {
        display: none;
    }

    .profile-form-container {
        padding: 40px;
    }

    .profile-form-container h4 {
        color: #1e293b;
        font-weight: 800;
        margin-bottom: 25px;
        font-size: 1.2rem;
        border-left: 4px solid #334eac;
        padding-left: 12px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #64748b;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.95rem;
        color: #334155;
        transition: all 0.2s;
    }

    .form-control:focus {
        background-color: #fff;
        border-color: #334eac;
        box-shadow: 0 0 0 4px rgba(51, 78, 172, 0.1);
        outline: none;
    }

    .form-text {
        font-size: 0.8rem;
        color: #94a3b8;
        margin-top: 6px;
        display: block;
    }

    .btn-primary {
        width: 100%;
        background: linear-gradient(135deg, #081f5c 0%, #334eac 100%);
        color: white;
        padding: 14px;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        margin-top: 10px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(51, 78, 172, 0.3);
    }
</style>

<div class="content-area">
    <div class="container-fluid" style="max-width: 600px; padding: 0;">
        <div class="row">
            <div class="col-12 mb-3">
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['admin_name'] ?? 'Admin'); ?>&background=0D8ABC&color=fff&size=128&bold=true" alt="Profile">
                <i class="fas fa-user"></i>
                <h2><?= htmlspecialchars($data['admin']['nama']); ?></h2>
                <p><?= htmlspecialchars($data['admin']['email']); ?></p>
            </div>

            <div class="profile-form-container">
                <h4 class="mb-4">Edit Informasi Pribadi</h4>
                <form action="<?= BASEURL; ?>/profile/update" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['admin']['nama']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($data['admin']['username']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['admin']['email']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>