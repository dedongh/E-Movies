<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\MovieContract;
use App\Http\Controllers\Controller;
use App\Model\MovieImage;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class MovieImageController extends Controller
{
    //
    use UploadAble;

    protected $movieRepo;

    public function __construct(MovieContract $movieContract)
    {
        $this->movieRepo = $movieContract;
    }


    public function upload(Request $request)
    {
        $movie = $this->movieRepo->findMovieById($request->movies_id);

        if ($request->has('image')) {
            $image = $this->uploadOne($request->image,'tixgo_content/movie_covers');

            $movieImage = new MovieImage([
                'full' => $image
            ]);

            $movie->images()->save($movieImage);
        }
        return response()->json(['status' => 'Success']);
    }


    public function delete($id)
    {
        $image = MovieImage::findOrFail($id);

        if ($image->full != '') {
            $this->deleteOne($image->full);
        }
        $image->delete();

        return redirect()->back();
    }
}
