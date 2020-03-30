<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\GenreContract;
use App\Contracts\MovieContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreMovieFormRequest;

class MovieController extends BaseController
{
    //
    protected $genreRepo;
    protected $movieRepo;

    public function __construct(GenreContract $genreContract, MovieContract $movieContract)
    {
        $this->genreRepo = $genreContract;
        $this->movieRepo = $movieContract;
    }

    public function add()
    {
        $genres = $this->genreRepo->listGenres('name', 'asc');

        $this->setPageTitle('Movies', 'Add Movies');
        return view('backend.Movies.add_movies', compact('genres'));
    }

    public function view()
    {
        $movies = $this->movieRepo->listMovies();

        $this->setPageTitle('Movies', 'All Movies');
        return view('backend.Movies.all_movies', compact('movies'));
    }

    public function store(StoreMovieFormRequest $request)
    {
        $params = $request->except('_token');

        $movie = $this->movieRepo->createMovie($params);

        if (!$movie) {
            return $this->responseRedirectBack('Error occurred while creating movie.', 'error', true, true);
        }

        return $this->responseRedirect('admin.movies','Movie created successfully', 'success', false, false);

    }

    public function edit($id)
    {
        $movie = $this->movieRepo->findMovieById($id);

        $genres = $this->genreRepo->listGenres('name', 'asc');

        $this->setPageTitle('Movies', 'Edit Movie');
        return view('backend.Movies.edit_movies', compact('movie','genres'));
    }


    public function update(StoreMovieFormRequest $request)
    {
        $params = $request->except('_token');

        $movie = $this->movieRepo->UpdateMovie($params);

        if (!$movie) {
            return $this->responseRedirectBack('Error occurred while creating movie.', 'error', true, true);
        }

        return $this->responseRedirect('admin.movies.view','Movie updated successfully', 'success', false, false);

    }

    public function delete(int $id)
    {
        $movie = $this->movieRepo->deleteMovie($id);
        if (!$movie) {
            return $this->responseRedirectBack('Error occurred while deleting movie.', 'error', true, true);
        }

        return $this->responseRedirect('admin.movies.view','Movie deleted successfully', 'success', false, false);

    }

    public function images(int $id)
    {
        $movie = $this->movieRepo->findMovieById($id);
        $this->setPageTitle('Movies', 'Add Images');
        return view('backend.Movies.movie_images', compact('movie'));
    }

    public function attributes($id)
    {
        $movie = $this->movieRepo->findMovieById($id);
        $this->setPageTitle('Movies', 'Add Images');
        return view('backend.Movie_attributes.add_movie_attributes', compact('movie'));
    }
}
