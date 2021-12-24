<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public const CATEGORIES = [
        'General' => 'General',
        'World' => 'World',
        'Nature' => 'Nature'
    ];

    protected $with = ['comments'];

    protected $fillable = [
        'title',
        'content',
        'creation_date',
        'category',
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
