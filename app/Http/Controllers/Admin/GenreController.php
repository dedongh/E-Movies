<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\GenreContract;
use App\Http\Controllers\BaseController;

class GenreController extends BaseController
{
    //
    protected $genreRepo;

    public function __construct(GenreContract $genreContract)
    {
        $this->genreRepo = $genreContract;
    }

    public function view()
    {
        $genres = $this->genreRepo->listGenres();

        $this->setPageTitle('Genres','All Genres');

        return view('backend.Genre.all_genres', compact('genres'));
    }
}
