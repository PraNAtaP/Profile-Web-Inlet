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

<div class="form-container">
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
                <div class="image-preview">
                    <p>Gambar saat ini:</p>
                    <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($gambar_value); ?>" alt="Gambar Berita">
                </div>
            <?php endif; ?>
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg">
             <small>Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>

        <div class="form-group">
            <label for="isi">Isi Berita</label>
            <textarea id="isi" name="isi" rows="10" required><?= htmlspecialchars($isi_value); ?></textarea>
        </div>

        <button type="submit" class="btn-save">Simpan</button>
        <a href="<?= BASEURL; ?>/berita" class="btn-back">Kembali</a>
    </form>
</div>