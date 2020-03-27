<?php

namespace App\Contracts;

interface MovieContract
{
    public function listMovies(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findMovieById(int $id);

    public function createMovie(array $params);

    public function UpdateMovie(array $params);

    public function deleteMovie(int $id);

    public function findMovieBySlug($slug);

}
