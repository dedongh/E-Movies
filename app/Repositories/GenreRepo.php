<?php
namespace App\Repositories;

use App\Contracts\GenreContract;
use App\Model\Genre;
use App\Traits\UploadAble;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;

class GenreRepo extends BaseRepository implements GenreContract{
    use UploadAble;

    public function __construct(Genre $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function listGenres(string $order = 'genre_id', string $sort = 'desc', array $columns = ['*'])
    {
        // TODO: Implement listGenres() method.
        return $this->all($columns, $order, $sort);
    }

    /**
     * @inheritDoc
     */
    public function findGenreById(int $id)
    {
        // TODO: Implement findGenreById() method.
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @inheritDoc
     */
    public function createGenre(array $params)
    {
        // TODO: Implement createGenre() method.
        try {
            $collection = collect($params);
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'tixgo_content/genre_covers');
            }
            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $genre = new Genre($merge->all());

            $genre->save();

            return $genre;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function updateGenre(array $params)
    {
        // TODO: Implement updateGenre() method.
        $genre = $this->findGenreById($params['genre_id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($genre->image != null) {
                $this->deleteOne($genre->image);
            }

            $image = $this->uploadOne($params['image'], 'tixgo_content/genre_covers');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $genre->update($merge->all());

        return $genre;
    }

    /**
     * @inheritDoc
     */
    public function deleteGenre($id)
    {
        // TODO: Implement deleteGenre() method.
        $genre = $this->findGenreById($id);
        if ($genre->image != null) {
            $this->deleteOne($genre->image);
        }

        $genre->delete();

        return $genre;
    }
}
