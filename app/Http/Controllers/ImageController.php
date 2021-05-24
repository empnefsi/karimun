<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function news(Request $request) {
        $name = $request->image->getClientOriginalName();
        $request->image->storeAs('public/news/inner',$name);
        
        $path = "storage/news/inner/{$name}";

        return response()->json([
            "url" => asset($path),
        ]);
    }
}
