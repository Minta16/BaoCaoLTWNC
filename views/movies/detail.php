<?php require __DIR__ . '/../layouts/header.php'; ?>

<main class="container detail-page">
    <a class="back-link" href="index.php">← Về trang chủ</a>

    <section class="detail-layout">
        <img
            class="detail-poster"
            src="<?= e(assetFile('img', $movie['poster'])) ?>"
            alt="Poster <?= e($movie['title']) ?>"
        >

        <div class="detail-content">
            <p class="eyebrow">THÔNG TIN PHIM</p>

            <h1><?= e($movie['title']) ?></h1>

            <div class="movie-meta">
                <span><?= (int) $movie['release_year'] ?></span>
                <span><?= e($movie['genre']) ?></span>
                <span><?= (int) $movie['duration_minutes'] ?> phút</span>
            </div>

            <p class="synopsis">
                <?= nl2br(e($movie['description'])) ?>
            </p>

            <a
                class="button"
                href="index.php?act=watch&id=<?= (int) $movie['id'] ?>"
            >
                ▶ Xem phim
            </a>
        </div>
    </section>
</main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>