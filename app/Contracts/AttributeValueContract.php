<?php
namespace App\Contracts;

interface AttributeValueContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @param int $attribute_id
     * @return mixed
     */
    public function listAttributeValues(int $attribute_id, string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id);

    /**
     * @param int $attribute_id
     * @return mixed
     */
    public function findAttributeByAttributeId(int $attribute_id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAttributeValue(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAttributeValue(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAttribute($id);
}
