<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeValueContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AttributeValueController extends BaseController
{
    //

    protected $attributeValueRepo;

    public function __construct(AttributeValueContract $attributeContract)
    {
        $this->attributeValueRepo = $attributeContract;
    }

    public function view_attribute_value($id)
    {
        $attributes = $this->attributeValueRepo->listAttributeValues($id);

        $this->setPageTitle('Attributes', 'View attribute values');
        return view('backend.Attribute_values.view_attributes_value', compact('attributes','id'));
    }

    public function add_attribute_value($id)
    {
        $this->setPageTitle('Attributes', 'Add new attribute values');
        return view('backend.Attribute_values.add_attributes_values', compact('id'));
    }

    public function store_value(Request $request)
    {
        $this->validate($request, [
            'value'          =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeValueRepo->createAttributeValue($params);

        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }

        return $this->responseRedirectBack('Attribute value added successfully' ,'success',false, false);

    }

    public function delete_attribute_value($id)
    {
        $attribute = $this->attributeValueRepo->deleteAttribute($id);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute value deleted successfully' ,'success',false, false);

    }

    public function edit_attribute_value($id)
    {
        $attribute = $this->attributeValueRepo->findAttributeById($id);

        $this->setPageTitle('Attributes', 'Edit attribute');
        return view('backend.Attribute_values.edit_attributes_values', compact('attribute'));
    }

    public function update_value(Request $request)
    {
        $this->validate($request, [
            'value'          =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeValueRepo->updateAttributeValue($params);


        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }

        return $this->responseRedirectBack('Attribute value updated successfully' ,'success',false, false);

    }
}
