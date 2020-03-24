<?php
namespace App\Repositories;

use App\Contracts\AttributeValueContract;
use App\Model\AttributeValue;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class AttributeValueRepo extends BaseRepository implements AttributeValueContract
{

    public function __construct(AttributeValue $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    /**
     * @inheritDoc
     */
    public function listAttributeValues(int $attribute_id, string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        // TODO: Implement listAttributeValues() method.
        return $this->all($columns, $order, $sort)->where('attribute_id', $attribute_id);
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
    public function findAttributeByAttributeId(int $id)
    {
        // TODO: Implement findAttributeByAttributeId() method.
    }

    /**
     * @inheritDoc
     */
    public function createAttributeValue(array $params)
    {
        // TODO: Implement createAttributeValue() method.

        try {

            $attribute = new AttributeValue($params);

            $attribute->save();

            return $attribute;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function updateAttributeValue(array $params)
    {
        // TODO: Implement updateAttributeValue() method.
        $attribute = $this->findAttributeById($params['id']);
        $collection = collect($params)->except('_token');

        $attribute->update($collection->all());

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
