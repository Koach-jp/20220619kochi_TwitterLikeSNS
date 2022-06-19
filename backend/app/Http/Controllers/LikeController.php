<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    public function createOrDestroy(LikeRequest $request)
    {
        $match = [
            'share_id' => $request->share_id,
            'uid' => $request->uid
        ];
        $item = Like::where($match)->exists();
        if ($item) {
            Like::where($match)->delete();
            return response()->json([
                'message' => 'Like Canceled'
            ], 200);
        } else {
            Like::create($match);
            return response()->json([
                'message' => 'Like Created'
            ], 200);
        }
    }

}
