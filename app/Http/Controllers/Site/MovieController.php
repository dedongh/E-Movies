<?php

namespace App\Http\Controllers\Site;

use App\Contracts\AttributeContract;
use App\Contracts\MovieContract;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    //
    protected $movieRepo;
    protected $attributeRepo;

    public function __construct(MovieContract $movieContract, AttributeContract $attributeContract)
    {
        $this->movieRepo = $movieContract;
        $this->attributeRepo = $attributeContract;
    }

    public function show($slug)
    {
        $movie = $this->movieRepo->findMovieBySlug($slug);

        $attributes = $this->attributeRepo->listAttributes();
        return view('frontend.movie_details', compact('movie','attributes'));
    }
}

//$query->whereBetween('age', [$ageFrom, $ageTo]);
