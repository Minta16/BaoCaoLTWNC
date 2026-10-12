<?php require __DIR__ . '/../layouts/header.php'; ?>

<main class="container watch-page">
    <a
        class="back-link"
        href="index.php?act=detail&id=<?= (int) $movie['id'] ?>"
    >
        ← Thông tin phim
    </a>

    <h1><?= e($movie['title']) ?></h1>

    <video
        class="video-player"
        controls
        playsinline
        preload="metadata"
        poster="<?= e(assetFile('img', $movie['poster'])) ?>"
    >
        <source
            src="<?= e(assetFile('videos', $movie['video'])) ?>"
            type="video/mp4"
        >

        Trình duyệt của bạn không hỗ trợ phát video HTML5.
    </video>

    <p class="watch-note">
        <?= e($movie['genre']) ?>
        · <?= (int) $movie['release_year'] ?>
        · <?= (int) $movie['duration_minutes'] ?> phút
    </p>
</main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>