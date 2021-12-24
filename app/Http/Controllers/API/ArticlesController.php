<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ArticleResource
     */
    public function index()
    {
        return new ArticleResource(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return ArticleResource
     */
    public function store(ArticleRequest $request, ArticleService $articleService)
    {
        $article = Article::create($request->all());

        // Store in external service too.
        $articleService->store($article);

        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        return new ArticleResource(Article::find($article->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return ArticleResource
     */
    public function update(ArticleRequest $request, Article $article, ArticleService $articleService)
    {
        $article->update($request->all());

        // Update in external service too.
        $articleService->update($article);

        return new ArticleResource(Article::find($article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, ArticleService $articleService)
    {
        $article->delete();

        // Delete in external service too.
        $articleService->delete($article);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
