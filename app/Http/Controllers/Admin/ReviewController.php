<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Model\Reviews;

class ReviewController extends BaseController
{
    //

    public function index()
    {
        $this->setPageTitle('Reviews', 'All Reviews');
        $reviews = Reviews::orderByRaw('id DESC')->get();
        return view('backend.Reviews.reviews', compact('reviews'));
    }

    public function delete($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->back();
    }
    public function approve($id)
    {
        Reviews::where('id', $id)->update(['status'=>1, 'seen'=>1]);
        return redirect()->back();
    }
    public function unapprove($id)
    {
        Reviews::where('id', $id)->update(['status'=>0]);
        return redirect()->back();
    }
}
