<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Http\Requests\StoreShareRequest;
use App\Http\Requests\UpdateShareRequest;

class ShareController extends Controller
{
    public function index()
    {
        $items = Share::with('likes')->get();
        return response()->json([
            'data' => $items
        ], 200);
    }

    public function store(StoreShareRequest $request)
    {
        $item = Share::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function show(Share $share)
    {
        $item = Share::with('likes')->find($share);
        $items = $share->comments;
        return response()->json([
            'data' => $item,
            'comdata' => $items,
        ], 200);
    }

    public function update(UpdateShareRequest $request, Share $share)
    {
        //not using
    }

    public function destroy(Share $share)
    {
        $isDeleted = Share::where('id',$share->id)->delete();
        if ($isDeleted) {
            return response()->json([
                'message' => 'Deleted Successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
    }
}
