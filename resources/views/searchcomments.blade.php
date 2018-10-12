@extends('layouts.master')
@section('title', "Список комментариев пользователя")
@section('content')

        <h2 class="heading-2">{{count($comments)}} комментариев</h2>
        @foreach ($comments as $comment)
            <div class="review" style="margin-left:200px;">
                <div class="desc">
                    <h4>
                        <span class="text-left">{{$comment->username}}</span>
                        <span class="text-right">{{$comment->created_at}}</span>
                    </h4>
                    @if ($comment->is_hidden == 0)
                        <p>{{$comment->comment}}</p>
                    @else
                        <p><i>Комментарий ожидает одобрения модератором.</i></p>
                    @endif

                    <h4>Likes: {{$comment->likes}}</h4>

                </div>



            </div>

@endforeach
        <div class="row">
            <div style="margin-left:400px;">
                {{ $comments->links() }}
            </div>
        </div>