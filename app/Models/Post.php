<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    public function getAllPosts(){
        $posts = DB::table('posts')-> paginate(2);
        return $posts;
    }


    public function getPublishedPosts(){
        $posts = $this -> latest('published_at')->published()-> paginate(2);
        return $posts;
    }
    public function getUnPublishedPosts(){
        $posts = $this -> latest('published_at')->UnPublished()-> paginate(2);
        return $posts;
    }
    /*Scopes*/
    public function scopePublished($query){
        $query -> where('published_at', '<=', Carbon::now())
            ->where('published', '=', 1)-> paginate(2);
    }
    public function scopeUnPublished($query){
        $query ->where('published', '=', 0);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'slug',
        'excerpt',
        'content',
        'published',
        'published_at'
    ];
}
