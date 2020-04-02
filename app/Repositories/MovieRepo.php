<?php

namespace App\Repositories;

use App\Contracts\MovieContract;
use App\Model\Movies;
use App\Traits\UploadAble;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class MovieRepo extends BaseRepository implements MovieContract
{

    use UploadAble;

    public function __construct(Movies $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listMovies(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        // TODO: Implement listMovies() method.
        return $this->all($columns, $order, $sort);
    }

    public function findMovieById(int $id)
    {
        // TODO: Implement findMovieById() method.
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createMovie(array $params)
    {
        // TODO: Implement createMovie() method.
        try {
            $collection = collect($params);
            $premiere = $collection->has('premiere') ? 1 : 0;
            $new_item = $collection->has('new_item') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;
            $featured = $collection->has('featured') ? 1 : 0;
            $coming_soon = $collection->has('coming_soon') ? 1 : 0;
            $now_showing = $collection->has('now_showing') ? 1 : 0;

            $merge = $collection->merge(compact('premiere', 'new_item', 'status', 'featured', 'coming_soon','now_showing'));

            $movie = new Movies($merge->all());

            $movie->save();

            if ($collection->has('genres')) {
                $movie->genres()->sync($params['genres']);
            }
            return $movie;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function UpdateMovie(array $params)
    {
        // TODO: Implement UpdateMovie() method.
        $movie = $this->findMovieById($params['id']);

        $collection = collect($params)->except('_token');

        $premiere = $collection->has('premiere') ? 1 : 0;
        $new_item = $collection->has('new_item') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;
        $featured = $collection->has('featured') ? 1 : 0;
        $coming_soon = $collection->has('coming_soon') ? 1 : 0;
        $now_showing = $collection->has('now_showing') ? 1 : 0;

        $merge = $collection->merge(compact('premiere', 'new_item', 'status', 'featured', 'coming_soon','now_showing'));

        $movie->update($merge->all());


        if ($collection->has('genres')) {
            $movie->genres()->sync($params['genres']);
        }
        return $movie;
    }

    public function deleteMovie(int $id)
    {
        // TODO: Implement deleteMovie() method.
        $movie = $this->findMovieById($id);

        $movie->delete();

        return $movie;
    }


    public function findMovieBySlug($slug)
    {
        // TODO: Implement findMovieBySlug() method.
        $movie = Movies::where('slug', $slug)->first();

        return $movie;

    }
}
