<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentResource
     */
    public function index()
    {
        return new CommentResource(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return CommentResource
     */
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->all());

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return CommentResource
     */
    public function show(Comment $comment)
    {
        return new CommentResource(Comment::find($comment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return CommentResource
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        return new CommentResource(Comment::find($comment->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
