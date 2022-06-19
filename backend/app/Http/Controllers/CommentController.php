<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    
    public function index()
    {
        //not using
    }

    public function store(StoreCommentRequest $request)
    {
        $item = Comment::create($request->all());
        return response()->json([
            'date' => $item
        ], 201);
    }

    public function show(Comment $comment)
    {
        //not using
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //not using
    }

    public function destroy(Comment $comment)
    {
        $isDeleted = Comment::where('id', $comment->id)->delete();
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
