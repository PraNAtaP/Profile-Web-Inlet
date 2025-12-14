<style>
    .detail-berita {
        padding: 120px 5% 80px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .detail-berita .container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 900px;
        position: relative;
        overflow: hidden;
    }

    .detail-berita .section-title {
        font-size: 2.2rem;
        color: white;
        margin-bottom: 40px;
        text-align: center;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .detail-content {
        display: flex;
        align-items: center;
        gap: 50px;
        margin-bottom: 40px;
    }

    .detail-image {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .detail-image img {
        width: 100%;
        max-width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 4px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease;
    }

    .detail-image img:hover {
        transform: scale(1.03) rotate(1deg);
    }

    .detail-info {
        flex: 1.5;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .detail-info h3 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #ffffffff;
        font-weight: 700;
    }

    .detail-info p {
        font-size: 1.1rem;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
    }

    .detail-info p strong {
        width: 100px;
        display: inline-block;
        color: #a4c2f4;
        font-weight: 600;
    }

    .btn-back {
        display: inline-flex;
        padding: 12px 30px;
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
        background: linear-gradient(90deg, #2a5298 0%, #1e3c72 100%);
    }

    /* RESPONSIVE (HP Mode) */
    @media (max-width: 768px) {
        .detail-berita {
            padding: 100px 5%;
        }

        .detail-content {
            flex-direction: column;
            text-align: center;
            gap: 30px;
        }

        .detail-image img {
            max-width: 200px;
            height: 200px;
        }

        .detail-info {
            width: 100%;
        }

        .detail-info p {
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .detail-info p strong {
            width: auto;
            margin-bottom: 2px;
        }

        .btn-back {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<section class="detail-berita">
    <div class="container">
        <h2 class="section-title"><?= htmlspecialchars($data['anggota']['jabatan']); ?></h2>
        <div class="detail-content">
            <div class="detail-image">
                <img src="<?= BASEURL; ?>/img/anggota/<?= htmlspecialchars($data['anggota']['foto']); ?>" alt="<?= htmlspecialchars($data['anggota']['nama']); ?>">
            </div>
            <div class="detail-info">
                <h3><?= htmlspecialchars($data['anggota']['nama']); ?><br><br></h3>
                <p><strong>Email :</strong> <?= htmlspecialchars($data['anggota']['email']); ?></p>
                <p><strong>Kontak :</strong> <?= htmlspecialchars($data['anggota']['kontak']); ?></p>

            </div>
        </div>
        <a href="<?= BASEURL; ?>/#team" class="btn-back">Kembali</a>
    </div>
</section>