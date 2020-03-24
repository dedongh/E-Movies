<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\GenreContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;


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

    public function add()
    {
        $genres = $this->genreRepo->listGenres('id','asc');

        $this->setPageTitle('Genres','Add Genres');

        return view('backend.Genre.add_genre', compact('genres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $genre = $this->genreRepo->createGenre($params);
        if (!$genre) {
            return $this->responseRedirectBack('Error occurred while creating genre.', 'error', true, true);
        }
        return $this->responseRedirect('admin.genre', 'Genre added successfully' ,'success',false, false);

    }

    public function delete($id)
    {
        $genre = $this->genreRepo->deleteGenre($id);

        if (!$genre) {
            return $this->responseRedirectBack('Error occurred while deleting genre.', 'error', true, true);
        }
        return $this->responseRedirect('admin.genre.view', 'Genre added successfully' ,'success',false, false);

    }

    public function edit($id)
    {
        $targetGenre = $this->genreRepo->findGenreById($id);
        $genres = $this->genreRepo->listGenres();

        $this->setPageTitle('Genres','Edit Genres'. $targetGenre->name);

        return view('backend.Genre.edit_genre', compact('genres','targetGenre'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $genre = $this->genreRepo->updateGenre($params);

        if (!$genre) {
            return $this->responseRedirectBack('Error occurred while updating genre.', 'error', true, true);
        }
        return $this->responseRedirect('admin.genre.view', 'Genre added successfully' ,'success',false, false);

    }

}
