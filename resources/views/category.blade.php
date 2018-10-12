@extends('layouts.master')
@section('title', "$category->name")
@section('content')

        <div class="colorlib-blog">
            <div class="container-wrap">
                    <h3><span>{{ $category->name }}</span></h3>
                    @foreach($posts as $post)
                        @if ("{{ $post->category_id }}" == "{{ $category->id }}")
                            <div class="col-md-4">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url({{ Voyager::image( $post->photo ) }});">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span style="background-color: black;">{{ $post->created_at }}</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article" style="background-color: black;"><a href="/post/{{ $post->title }}">{{ $post->title }}</a></h2>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach

            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-9">
        {{ $posts->links() }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>

@endsection