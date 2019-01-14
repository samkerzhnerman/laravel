<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) {

        $this->validate($request, [
            'body' => 'required|min:2',
            'author' => 'required',
        ]);
        $newsItem = News::find($request->post_id);

        $comment = App\Comment::where('news_id','=', $post->id, 'AND', 'is_hidden', '=', 0);

        $newsItem->comments()->create([
            'body' => $request->body,
            'author' => $request->author,
            'news_id' => $request->news_id,
        ]);

        return redirect('/post/' . $newsItem->id . '#comments');

    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return back();
    }

    public function update(CommentRequest $request, Comment $comment) {

        $comment->update($request->all());
        return redirect('/news/' . $comment->news_id . '#comments');
    }

} 
