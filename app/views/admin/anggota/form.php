<?php
$is_edit = isset($data['anggota']) && $data['anggota'];
$page_title = $is_edit ? 'Edit Anggota Lab' : 'Tambah Anggota Lab';
$form_action = $is_edit ? BASEURL . '/anggota/update' : BASEURL . '/anggota/simpan';
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
<div class="form-container">
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
                <div class="image-preview">
                    <p>Foto saat ini:</p>
                    <img src="<?= BASEURL; ?>/img/anggota/<?= htmlspecialchars($foto_value); ?>" alt="Foto Profil">
                </div>
            <?php endif; ?>
            <input type="file" id="foto" name="foto" accept="image/jpeg, image/png, image/jpg">
             <small>Kosongkan jika tidak ingin mengubah foto. Ukuran maks 2MB.</small>
        </div>
        <button type="submit" class="btn-save">Simpan</button>
        <a href="<?= BASEURL; ?>/anggota" class="btn-back">Kembali</a>
    </form>
</div>
