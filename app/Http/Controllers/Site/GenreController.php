<?php

namespace App\Http\Controllers\Site;

use App\Contracts\GenreContract;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    //
    protected $genreRepo;

    public function __construct(GenreContract $genreContract)
    {
        $this->genreRepo = $genreContract;
    }

    public function show($slug)
    {
        $genre = $this->genreRepo->findBySlug($slug);

        $ass_movie = $genre->movies;

        /*foreach ($ass_movie as $movie) {
            print_r($movie->title);
        }*/



       return view('frontend.catalog', compact('genre','ass_movie'));
    }

}
