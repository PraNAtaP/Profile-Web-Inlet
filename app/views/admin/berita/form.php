<?php
// Tentukan apakah ini mode edit atau tambah
$is_edit = isset($data['berita']) && $data['berita'];

// Atur variabel untuk form
$page_title = $is_edit ? 'Edit Berita' : 'Tambah Berita';
$form_action = $is_edit ? BASEURL . '/berita/update' : BASEURL . '/berita/simpan';

// Inisialisasi nilai default
$id_value = '';
$judul_value = '';
$gambar_value = ''; // Dulu video_embed
$isi_value = '';

// Jika mode edit, isi dengan data yang ada
if ($is_edit) {
    $id_value = $data['berita']['id_berita'];
    $judul_value = $data['berita']['judul'];
    $gambar_value = $data['berita']['video_embed']; // Nama kolom di DB tetap video_embed
    $isi_value = $data['berita']['isi'];
}
?>

<div class="form-container" style="max-width: 800px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h1><?= $page_title; ?></h1>

    <form action="<?= $form_action; ?>" method="post" enctype="multipart/form-data">
        <?php if ($is_edit): ?>
            <input type="hidden" name="id_berita" value="<?= htmlspecialchars($id_value); ?>">
            <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($gambar_value); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($judul_value); ?>" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Berita</label>
            <?php if ($is_edit && $gambar_value): ?>
                <div class="image-preview" style="margin-bottom: 10px;">
                    <p>Gambar saat ini:</p>
                    <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($gambar_value); ?>" alt="Gambar Berita" style="max-width: 200px; height: auto; border-radius: 4px;">
                </div>
            <?php endif; ?>
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg">
             <small style="display: block; margin-top: 5px; color: #888;">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>

        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea id="isi" name="isi" rows="10" required><?= htmlspecialchars($isi_value); ?></textarea>
        </div>

        <button type="submit" class="btn-save" style="background-color: #007bff; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
        <a href="<?= BASEURL; ?>/berita" class="btn-back" style="display: inline-block; margin-top: 15px; color: #555; text-decoration: none;">Kembali</a>
    </form>
</div>
<style>
/* Pindahkan CSS dari file lama untuk menjaga tampilan */
.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
.form-group input[type="text"], .form-group input[type="file"], .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 16px; }
.form-group textarea { resize: vertical; }
</style>