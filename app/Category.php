<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    protected $fillable = ['title'];

    public function newsItems() {
        return $this->belongsTo('App\News');
    }

    public static function getAllCategories() {
        $result = [];
        $categories = Category::all(['id', 'title'])->toArray();
        foreach ($categories as $category) {
            $categoryId = $category['id'];
            $result[$categoryId] = $category['title'];
        }
        return $result;
    }

}
