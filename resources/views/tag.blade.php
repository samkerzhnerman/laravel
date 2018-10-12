@extends('layouts.master')
@section('title', "$tag->name")
@section('content')

        <div class="colorlib-blog">
            <div class="container-wrap">
                <h3><span>{{ $tag->name }}</span></h3>
            <!-- {{ $counter=1}} -->
                @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="blog-entry">
                                <div class="blog-img" style="background-image: url({{ Voyager::image( $post[0]->photo ) }});">
                                    <div class="desc desc2 text-center">
                                        <p class="tag"><span style="background-color: black;">{{ $post[0]->created_at }}</span></p>
                                        <div class="desc-bottom">
                                            <h2 class="head-article" style="background-color: black;"><a href="/post/{{ $post[0]->title }}">{{ $post[0]->title }}</a></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--	{{++$counter}} -->
                @endforeach

            </div>
        </div>

@endsection