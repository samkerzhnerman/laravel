@extends('layouts.master')
@section('title', "Список комментариев пользователя")
@section('content')
<div>
        <h2 class="heading-2" style="margin-left:400px;">{{$totalcomments}} комментариев</h2>
        @foreach ($comments as $comment)
            <div style="margin-left:400px;">
                <!-- <div class="desc" style="margin-left:300px;"> -->
                  
                <h4>
                        <span class="text-left">{{$user->name}}</span>
                        <span class="text-right"><a href="/post/{{$posts[$comment->item_id-4]->title}}"">{{$comment->created_at}}</a></span>
                    </h4>
                    @if ($comment->is_hidden == 0)
                        <p>{{$comment->comment}}</p>
                    @else
                        <p><i>Комментарий ожидает одобрения модератором.</i></p>
                    @endif

                    

                



            </div>
        
</div>

@endforeach
        <div class="row">
            <div style="margin-left:400px;">
                {{ $comments->links() }}
            </div>
        </div>