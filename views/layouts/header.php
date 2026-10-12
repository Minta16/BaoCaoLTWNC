<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= e($pageTitle ?? 'Trang chủ') ?> | NhanFlix</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="logo" href="index.php">NHANFLIX</a>

            <nav aria-label="Menu chính">
                <a href="index.php">Trang chủ</a>
                <a href="index.php#movies">Danh sách phim</a>
            </nav>

            <form class="search-form" action="index.php" method="get">
                <label class="sr-only" for="search">Tìm tên phim</label>

                <input
                    id="search"
                    type="search"
                    name="q"
                    placeholder="Tìm tên phim..."
                    value="<?= e($keyword ?? '') ?>"
                    maxlength="200"
                >

                <button type="submit">Tìm</button>
            </form>
        </div>
    </header>   