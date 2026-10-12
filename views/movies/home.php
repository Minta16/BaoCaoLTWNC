<?php require __DIR__ . '/../layouts/header.php'; ?>

<main>
    <?php if ($featured !== null && $keyword === ''): ?>
        <section class="hero">
            <img
                class="hero-image"
                src="<?= e(assetFile('img', $featured['poster'])) ?>"
                alt=""
            >

            <div class="container hero-content">
                <p class="eyebrow">PHIM NỔI BẬT</p>

                <h1><?= e($featured['title']) ?></h1>

                <p class="hero-description">
                    <?= e($featured['description']) ?>
                </p>

                <div class="button-group">
                    <a
                        class="button"
                        href="index.php?act=watch&id=<?= (int) $featured['id'] ?>"
                    >
                        ▶ Xem ngay
                    </a>

                    <a
                        class="button button-secondary"
                        href="index.php?act=detail&id=<?= (int) $featured['id'] ?>"
                    >
                        Thông tin phim
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="container movie-section" id="movies">
        <div class="section-heading">
            <h2>
                <?= $keyword !== ''
                    ? 'Kết quả tìm kiếm: ' . e($keyword)
                    : 'Phim mới cập nhật' ?>
            </h2>

            <span><?= count($movies) ?> phim</span>
        </div>

        <?php if (empty($movies)): ?>
            <div class="empty-state">
                <p>Chưa có phim phù hợp.</p>
                <a class="button" href="index.php">Xem tất cả phim</a>
            </div>
        <?php else: ?>
            <div class="movie-grid">
                <?php foreach ($movies as $movie): ?>
                    <a
                        class="movie-card"
                        href="index.php?act=detail&id=<?= (int) $movie['id'] ?>"
                    >
                        <div class="poster-wrap">
                            <img
                                src="<?= e(assetFile('img', $movie['poster'])) ?>"
                                alt="Poster <?= e($movie['title']) ?>"
                                loading="lazy"
                            >

                            <span class="play-badge">▶</span>
                        </div>

                        <h3><?= e($movie['title']) ?></h3>

                        <p>
                            <?= (int) $movie['release_year'] ?>
                            · <?= e($movie['genre']) ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>