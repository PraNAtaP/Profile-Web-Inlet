<?php
$is_edit = isset($data['anggota']) && $data['anggota'];
$page_title = $is_edit ? 'Edit Anggota Lab' : 'Tambah Anggota Lab';
$form_action = $is_edit ? BASEURL . '/anggota/update' : BASEURL . '/anggota/simpan';

// Nilai default
$id_value = '';
$nama_value = '';
$jabatan_value = '';
$kontak_value = '';
$email_value = '';
$foto_value = '';

if ($is_edit) {
    $agt = $data['anggota'];
    $id_value = $agt['id_anggota'];
    $nama_value = $agt['nama'];
    $jabatan_value = $agt['jabatan'];
    $kontak_value = $agt['kontak'];
    $email_value = $agt['email'];
    $foto_value = $agt['foto'];
}
?>

<div class="form-container" style="max-width: 800px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h1><?= $page_title; ?></h1>

    <form action="<?= $form_action; ?>" method="post" enctype="multipart/form-data">
        <?php if ($is_edit): ?>
            <input type="hidden" name="id_anggota" value="<?= htmlspecialchars($id_value); ?>">
            <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($foto_value); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama_value); ?>" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value="<?= htmlspecialchars($jabatan_value); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_value); ?>" required>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak (No. HP atau lainnya)</label>
            <input type="text" id="kontak" name="kontak" value="<?= htmlspecialchars($kontak_value); ?>">
        </div>

        <div class="form-group">
            <label for="foto">Foto Profil</label>
            <?php if ($is_edit && $foto_value): ?>
                <div class="image-preview" style="margin-bottom: 10px;">
                    <p>Foto saat ini:</p>
                    <img src="<?= BASEURL; ?>/img/anggota/<?= htmlspecialchars($foto_value); ?>" alt="Foto Profil" style="max-width: 150px; height: auto; border-radius: 8px;">
                </div>
            <?php endif; ?>
            <input type="file" id="foto" name="foto" accept="image/jpeg, image/png, image/jpg">
             <small style="display: block; margin-top: 5px; color: #888;">Kosongkan jika tidak ingin mengubah foto. Ukuran maks 2MB.</small>
        </div>

        <button type="submit" class="btn-save" style="background-color: #007bff; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
        <a href="<?= BASEURL; ?>/anggota" class="btn-back" style="display: inline-block; margin-left: 10px; color: #555; text-decoration: none;">Kembali</a>
    </form>
</div>

<style>
.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
.form-group input[type="text"], .form-group input[type="email"], .form-group input[type="file"], .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 16px; }
</style>
