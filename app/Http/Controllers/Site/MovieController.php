<?php

namespace App\Http\Controllers\Site;

use App\Contracts\AttributeContract;
use App\Contracts\GenreContract;
use App\Contracts\MovieContract;
use App\Http\Controllers\Controller;
use App\Model\Movies;

class MovieController extends Controller
{
    //
    protected $movieRepo;
    protected $attributeRepo;
    protected $genreRepo;

    public function __construct(MovieContract $movieContract, AttributeContract $attributeContract, GenreContract $genreContract)
    {
        $this->movieRepo = $movieContract;
        $this->attributeRepo = $attributeContract;
        $this->genreRepo = $genreContract;
    }

    public function show($slug)
    {
        $movie = $this->movieRepo->findMovieBySlug($slug);

        $attributes = $this->attributeRepo->listAttributes();
        return view('frontend.movie_details', compact('movie','attributes'));
    }

    public function all()
    {
        //$movies = $this->movieRepo->listMovies();
        $movies = Movies::paginate(8);
        $genres = $this->genreRepo->listGenres();
        return view('frontend.movies_catalog', compact('movies','genres'));
    }
}

//$query->whereBetween('age', [$ageFrom, $ageTo]);
