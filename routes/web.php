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
    $topcommenters = DB::table('comments')->selectRaw('count(id) as countid, username')->groupby('username')->orderByRaw('count(id) desc')->limit(5)->get();
    $toppostids = DB::table('comments')->selectRaw('count(id) as countid, news_id')
        ->groupby('news_id')
        ->orderByRaw(' count(id) desc')->limit(3)->get();
    //print_r($toppostids);
    //die;
    $toptodayposts = [];
    foreach ($toppostids as $toppostid)
        {

                    $toptodayposts[] = App\News::where('id', '=', $toppostid->news_id)->get();


            }
    return view('home', compact('posts', 'sliderposts', 'categories', 'ads', 'topcommenters','toptodayposts'));
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

    $comments = App\Comment::where('news_id','=', $post->id, 'AND', 'is_hidden', '=', '0')->orderByRaw('likes DESC')->get();
	return view('post', compact('post', 'categories', 'tagids', 'tags', 'comments', 'analytics','ads'));
});

Route::get('searchcomments/{title}', function($title){
    $categories = App\Category::all();
    $ads = App\Ad::all();
    $comments = App\Comment::where('username','=', $title, 'AND', 'is_hidden', '=', '0')->orderByRaw('likes DESC')->paginate(3);
    return view('searchcomments', compact('comments', 'categories', 'ads'));
});

Route::post('addcomment/{message}', function($message){
    $username = $_POST['username'];
    $news_id = $_POST['news_id'];
    $comment = $_POST['comment'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $created_at = date_create();
    $category = App\Category::where('id', '=', $category_id)->firstOrFail();
    if ($category->id == 2) {
        DB::table('comments')->insert(
            [
                'username' => $username,
                'news_id' =>  $news_id,
                'comment' => $comment,
                'created_at' => $created_at,
                'is_hidden' => '1'

            ]);
    }
    else {
        DB::table('comments')->insert(
            [
                'username' => $username,
                'news_id' =>  $news_id,
                'comment' => $comment,
                'created_at' => $created_at,
                'is_hidden' => '0'

            ]);

    }
    return redirect ('post/'. $title);
});

Route::post('like/{message}', function($message){
    $title = $_POST['title'];
    $likes = $_POST['likes'];
    $likes = ++$likes;
    DB::table('comments')->where('id', $message)->update(['likes' => $likes]);
    return redirect ('post/'. $title);
});

Route::post('unlike/{message}', function($message){
    $title = $_POST['title'];
    $likes = $_POST['likes'];
    $likes = --$likes;
    if ($likes<0) $likes=0;
    DB::table('comments')->where('id', $message)->update(['likes' => $likes]);
    return redirect ('post/'. $title);
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

