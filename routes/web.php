<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = App\News::orderby('created_at','DESC')->get();
    $sliderposts = App\News::orderby('created_at','DESC')->limit('3')->get();
    $categories = App\Category::all();
    $ads = App\Ad::all();
    $topcommenters = DB::table('laravellikecomment_comments')->selectRaw('count(id) as countid, user_id')->groupby('user_id')->orderByRaw('count(id) desc')->limit(5)->get();
    $topcommenternames = [];
    foreach ($topcommenters as $topcommenter)
    {
        $topcommenternames[] = DB::table('users')->where('id','=', $topcommenter->user_id)->first();
    }
    $toppostids = DB::table('laravellikecomment_comments')->selectRaw('count(id) as countid, item_id')
        ->groupby('item_id')
        ->orderByRaw(' count(id) desc')->limit(3)->get();
    //print_r($toppostids);
    //die;
    $toptodayposts = [];
    foreach ($toppostids as $toppostid)
        {
        $toptodayposts[] = App\News::where('id', '=', $toppostid->item_id)->get();
        }
    return view('home', compact('posts', 'sliderposts', 'categories', 'ads', 'topcommenters','toptodayposts','topcommenternames'));
});

Route::get('post/{title}', function($title){
    $post = App\News::where('title', '=', $title)->firstOrFail();
    $categories = App\Category::all();
    $ads = App\Ad::all();
    $tagids = DB::table('news_tags')->select('tag_id')->where('news_id','=', $post->id)->get();
    $tags=[];
    $analytics=FALSE;
    foreach ($tagids as $tagid)
    {

        $tags[] = DB::table('tags')->select('name')->where('id','=', $tagid->tag_id)->get();

        if ($tagid->tag_id == '4') $analytics=TRUE;
    }

    $comments = DB::table('laravellikecomment_comments')->where('item_id','=', $post->id)->get();
	return view('post', compact('post', 'categories', 'tagids', 'tags', 'comments', 'analytics','ads'));
});

Route::get('searchcomments/{title}', function($title){
    $categories = App\Category::all();
    $ads = App\Ad::all();
    $comments = DB::table('laravellikecomment_comments')->where('user_id','=', $title)->paginate(5);
    $totalcomments = count(DB::table('laravellikecomment_comments')->where('user_id','=', $title)->get());
    $user = DB::table('users')->where('id','=', $title)->first();
    $posts = App\News::all();
    return view('searchcomments', compact('comments', 'categories', 'ads', 'user', 'totalcomments', 'posts'));
});

Route::get('category/{name}', function($title){
    $ads = App\Ad::all();
    $category = App\Category::where('name', '=', $title)->firstOrFail();
    $posts = App\News::where('category_id', '=', $category->id)->orderby('created_at','DESC')->paginate(6);
    $categories = App\Category::all();
    return view('category', compact('category', 'posts', 'categories','ads'));
});

Route::get('tag/{name}', function($title){
    $ads = App\Ad::all();
    $tag = App\Tag::where('name','=',$title)->firstOrFail();
    $postids = DB::table('news_tags')->select('news_id')->where('tag_id','=', $tag->id)->get();
    $categories = App\Category::all();
    $posts=[];
    foreach ($postids as $postid)
    {
        $posts[] = App\News::where('id','=', $postid->news_id)->get();
    }
    return view('tag', compact('tag', 'posts', 'categories','ads'));
});


Auth::routes();

Route::get('/home', function () {
    return redirect ('/');
});
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('autocomplete', 'AutocompleteController@autocomplete')->name('autocomplete');

