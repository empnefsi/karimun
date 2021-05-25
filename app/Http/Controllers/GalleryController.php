<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Image;

class GalleryController extends Controller
{
    public function store(Request $request) {
        $name = $request['file']->getClientOriginalName();
        $img = Image::make($request['file']->getRealPath())->encode('jpg', 0)->orientate();
        $img->stream();
        Storage::disk('local')->put("public/packages/gallery/" . $name, $img, 'public');
        
        $path = "storage/packages/gallery/{$name}";

        return response()->json([
            "name" => asset($path),
        ]);
    }

    public function delete($id) {
        Image::find($id)->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
