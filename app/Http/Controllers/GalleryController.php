<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Image as Images;

class GalleryController extends Controller
{
    public function store(Request $request) {
        // $name = $request['file']->getClientOriginalName();
        $ext = $request['file']->getClientOriginalExtension();
        $name = Str::random(40).'.'.$ext;

        $img = Image::make($request['file']->getRealPath())->encode('jpg', 0)->orientate();
        $img->stream();

        Storage::disk('local')->put("public/packages/gallery/" . $name, $img, 'public');
        
        $path = "storage/packages/gallery/{$name}";

        return response()->json([
            "fileName" => $name,
        ]);
    }

    public function delete(Request $request) {
        Images::where('image_id', $request->id)->delete();
        Storage::delete('public/packages/gallery/'.$request->val);

        return response()->json('Success');
    }
}
