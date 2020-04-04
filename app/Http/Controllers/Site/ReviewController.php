<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Model\Reviews;
use Illuminate\Http\Request;

class ReviewController extends BaseController
{
    //
    public function create(Request $request)
    {
        $params = $request->except('_token');

        $review = Reviews::create($params);
        if (!$review) {
            return $this->responseRedirectBack('Error occurred while creating review.', 'error', true, true);
        }
        return $this->responseRedirectBack( 'Review added successfully' ,'success',false, false);

    }
}
