<?php

class Movie
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(string $keyword = ''): array
    {
        if ($keyword !== '') {
            $sql = 'SELECT * FROM movies
                    WHERE title LIKE :keyword
                    ORDER BY created_at DESC, id DESC';

            $statement = $this->db->prepare($sql);

            $statement->execute([
                'keyword' => '%' . $keyword . '%',
            ]);

            return $statement->fetchAll();
        }

        $statement = $this->db->query(
            'SELECT * FROM movies
             ORDER BY created_at DESC, id DESC'
        );

        return $statement->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $statement = $this->db->prepare(
            'SELECT * FROM movies WHERE id = :id'
        );

        $statement->execute(['id' => $id]);

        $movie = $statement->fetch();

        return $movie === false ? null : $movie;
    }
}