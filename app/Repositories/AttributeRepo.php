<?php

namespace App\Repositories;

use App\Contracts\AttributeContract;
use App\Model\Attribute;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class AttributeRepo extends BaseRepository implements AttributeContract
{
    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        // TODO: Implement listAttributes() method.
        return $this->all($columns, $order, $sort);
    }

    /**
     * @inheritDoc
     */
    public function findAttributeById(int $id)
    {
        // TODO: Implement findAttributeById() method.
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @inheritDoc
     */
    public function createAttribute(array $params)
    {
        // TODO: Implement createAttribute() method.
        try {
            $collection = collect($params);

            $is_filterable = $collection->has('is_filterable') ? 1 : 0;
            $is_required = $collection->has('is_required') ? 1 : 0;

            $merge = $collection->merge(compact('is_filterable', 'is_required'));

            $attribute = new Attribute($merge->all());

            $attribute->save();

            return $attribute;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function updateAttribute(array $params)
    {
        // TODO: Implement updateAttribute() method.
        $attribute = $this->findAttributeById($params['id']);

        $collection = collect($params)->except('_token');

        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;

        $merge = $collection->merge(compact('is_filterable', 'is_required'));

        $attribute->update($merge->all());

        return $attribute;
    }

    /**
     * @inheritDoc
     */
    public function deleteAttribute($id)
    {
        // TODO: Implement deleteAttribute() method.
        $attribute = $this->findAttributeById($id);

        $attribute->delete();

        return $attribute;
    }
}
