<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ArticleService {

    /**
     * Store a new article in external api
     *
     * @param  \App\Models\Article  $article
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Article $article) {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('services.ext_service.token'),
                'Accept' => config('services.ext_service.accept')
            ])->post(config('services.ext_service.base_url').'/articles', [
                'data' => [
                    'type' => 'article',
                    'attributes' => [
                        'title' => $article->title,
                        'content' => $article->content,
                        'category' => $article->category,
                        'date' => $article->creation_date,
                        'uuid' => $article->id
                    ]
                ],
            ]);
        } catch (\Exception $e){
            error_log($e->getMessage());
        }
        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Update an article in external api
     *
     * @param  \App\Models\Article  $article
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Article $article) {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('services.ext_service.token'),
                'Accept' => config('services.ext_service.accept')
            ])->put(config('services.ext_service.base_url') . '/articles/' . $article->id, [
                'data' => [
                    'id' => $article->id,
                    'type' => 'article',
                    'attributes' => [
                        'title' => $article->title,
                        'content' => $article->content,
                        'category' => $article->category,
                        'date' => $article->creation_date,
                        'uuid' => $article->id
                    ]
                ],
            ]);
        } catch (\Exception $e){
            error_log($e->getMessage());
        }
        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified article from external api.
     *
     * @param  \App\Models\Article  $article
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(Article $article) {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('services.ext_service.token'),
                'Accept' => config('services.ext_service.accept')
            ])->delete(config('services.ext_service.base_url') . '/articles/' . $article->id);
        } catch (\Exception $e){
            error_log($e->getMessage());
        }
        return response($response, Response::HTTP_NO_CONTENT);
    }
}
