<?php

class MovieController
{
    private Movie $movieModel;

    public function __construct(Movie $movieModel)
    {
        $this->movieModel = $movieModel;
    }

    public function home(): void
    {
        $keyword = isset($_GET['q']) && is_string($_GET['q'])
            ? trim($_GET['q'])
            : '';

        $movies = $this->movieModel->getAll($keyword);
        $featured = $movies[0] ?? null;
        $pageTitle = 'Trang chủ';

        require __DIR__ . '/../views/movies/home.php';
    }

    public function detail(int $id): void
    {
        $movie = $this->movieModel->findById($id);

        if ($movie === null) {
            $this->notFound();
            return;
        }

        $pageTitle = $movie['title'];

        require __DIR__ . '/../views/movies/detail.php';
    }

    public function watch(int $id): void
    {
        $movie = $this->movieModel->findById($id);

        if ($movie === null) {
            $this->notFound();
            return;
        }

        $pageTitle = 'Đang xem: ' . $movie['title'];

        require __DIR__ . '/../views/movies/watch.php';
    }

    public function notFound(): void
    {
        http_response_code(404);
        $pageTitle = 'Không tìm thấy';

        require __DIR__ . '/../views/layouts/header.php';

        echo '<main class="container empty-state">';
        echo '<h1>Không tìm thấy trang hoặc phim.</h1>';
        echo '<a class="button" href="index.php">Về trang chủ</a>';
        echo '</main>';

        require __DIR__ . '/../views/layouts/footer.php';
    }
}