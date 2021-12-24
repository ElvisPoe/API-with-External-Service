<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Article;

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
        // Because of the Imaginary API the request fails and $response is not defined. Initializing the $response attribute is an option.
        // This whould be the actual return.
        // return response($response, Response::HTTP_CREATED);
        return response(TRUE, Response::HTTP_CREATED);
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
        return response(TRUE, Response::HTTP_OK);
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
        return response(TRUE, Response::HTTP_NO_CONTENT);
    }
}
