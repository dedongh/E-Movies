<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Attribute;
use App\Model\MovieAttribute;
use App\Model\Movies;
use Illuminate\Http\Request;

class MovieAttributeController extends Controller
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
        $movieAttribute = MovieAttribute::create($request->data);

        if ($movieAttribute) {
            return response()->json(['message' => 'Movie attribute added successfully.']);
        } else {
            return response()->json(['message' => 'Something went wrong while submitting movie attribute.']);
        }
    }

    public function deleteAttribute(Request $request)
    {
        $movieAttribute = MovieAttribute::findOrFail($request->id);
        $movieAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Movie attribute deleted successfully.']);
    }
}
