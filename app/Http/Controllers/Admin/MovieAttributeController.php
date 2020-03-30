<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Model\Attribute;
use App\Model\MovieAttribute;
use App\Model\Movies;
use Illuminate\Http\Request;

class MovieAttributeController extends BaseController
{
    //
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    public function movieAttributes(Request $request)
    {
        $product = Movies::findOrFail($request->id);

        return response()->json($product->attributes);
    }

    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    public function addAttribute(Request $request)
    {
        $params = $request->except('_token');
        $movieAttribute = MovieAttribute::create($params);

        if (!$movieAttribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute created successfully', 'success', false, false);
    }

    public function deleteAttribute($id)
    {
        $movieAttribute = MovieAttribute::findOrFail($id);
        $movieAttribute->delete();

        if (!$movieAttribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute deleted successfully', 'success', false, false);

    }

    public function editAttribute($id)
    {
        $movieAttribute = MovieAttribute::findOrFail($id);
        $movie_values = Movies::findOrFail($id);
        $attributes = Attribute::all();
        $attribute_values = Attribute::findOrFail(1);

        $this->setPageTitle('Movies', 'Edit Movie Attribute');
        return view('backend.Movie_attributes.edit_movie_attributes', compact('movieAttribute',
            'movie_values', 'attributes','attribute_values'));
    }

    public function updateAttribute(Request $request)
    {
        $params = $request->except('_token');
        $movieAttribute = MovieAttribute::where('id', $request->id)->update($params);

        if (!$movieAttribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute updated successfully', 'success', false, false);
    }


}
