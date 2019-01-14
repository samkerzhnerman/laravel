<?php

namespace App;

/*  use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'body'];

    public function newsItem() {
        return $this->belongsTo(News::class, 'news_id');
    } 
} 

namespace risul\LaravelLikeComment\Models; */

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laravellikecomment_comments';

    /**
	 * Fillable array
     */
    protected $fillable = ['user_id', 'parent_id', 'item_id', 'comment'];
}

