<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AttributesController extends BaseController
{
    //
    protected $attributeRepo;

    public function __construct(AttributeContract $attributeContract)
    {
        $this->attributeRepo = $attributeContract;
    }

    public function add()
    {
        $this->setPageTitle('Attributes', 'Add new attribute');
        return view('backend.Attributes.add_attributes');
    }

    public function view()
    {
        $attributes = $this->attributeRepo->listAttributes();

        $this->setPageTitle('Attributes', 'Add new attribute');
        return view('backend.Attributes.view_attributes', compact('attributes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepo->createAttribute($params);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }

        return $this->responseRedirect('admin.attributes.add','Attribute added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $attribute = $this->attributeRepo->findAttributeById($id);

        $this->setPageTitle('Attributes', 'Edit attribute');
        return view('backend.Attributes.edit_attributes', compact('attribute'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepo->updateAttribute($params);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute updated successfully' ,'success',false, false);

    }

    public function delete($id)
    {
        $attribute = $this->attributeRepo->deleteAttribute($id);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while updating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute deleted successfully' ,'success',false, false);

    }
}
