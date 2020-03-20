<?php
namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 *
 * @package \App\Repositories
 */
class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        return $this->model->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id)
    {
        // TODO: Implement update() method.
        return $this->find($id)->update($attributes);
    }

    /**
     * @inheritDoc
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc')
    {
        // TODO: Implement all() method.
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function find(int $id)
    {
        // TODO: Implement find() method.
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOneOrFail(int $id)
    {
        // TODO: Implement findOneOrFail() method.
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        return $this->model->find($id)->delete();
    }

    /**
     * @inheritDoc
     */
    public function findBy(array $data)
    {
        // TODO: Implement findBy() method.
        return $this->model->where($data)->all();
    }

    /**
     * @inheritDoc
     */
    public function findOneBy(array $data)
    {
        // TODO: Implement findOneBy() method.
        return $this->model->where($data)->first();
    }

    /**
     * @inheritDoc
     */
    public function findOneByOrFail(array $data)
    {
        // TODO: Implement findOneByOrFail() method.
        return $this->model->where($data)->firstOrFail();
    }
}
