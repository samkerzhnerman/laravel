@extends('layouts.master')
@section('title', "$post->title")
@section('content')
		<div class="colorlib-blog">
			<div class="container-wrap">
				<div class="row">
					<div class="col-md-12">
						<div class="content-wrap">
							<article class="animate-box">
								<div class="blog-img" style="background-image: url({{ Voyager::image( $post->photo ) }});"></div>
								<div class="desc">
									<div class="meta">
										<p>
											<span><?php echo ($categories[($post->category_id-1)]->name); ?></span>
											<span>{{ $post->created_at }}</span>
											<span>{{count($comments)}} комментариев</span>
										</p>
									</div>
									<h2><a href="/post/{{ $post->title }}">{{ $post->title }}</a></h2>

									@if ($analytics == TRUE && !isset(Auth::user()->name))
										<p>{!! ltrim(substr($post->text,1,800), 'p>')."..." !!}</p>
										<p><i>Остальной текст доступен только для зарегистрированных пользователей</i></p>
									@else
										<p>{!! $post->text !!}</p>
									@endif
									<p>

										<b>Теги:
										@foreach ($tags as $tag)
												<a href="/tag/{{ $tag[0]->name }}">{{ $tag[0]->name }}</a>&nbsp;
										@endforeach
										</b>
									</p>

								</div>
								</div>
							</article>
							<div class="row">
								<div class="col-md-12" style="margin-left:20px;">
                                                                    @include('laravelLikeComment::comment', ['comment_item_id' => $post->id, 'comment_category_id' => $post->category_id])
									
								</div>
							</div>
						
							</div>
						</div>
					</div>





				</div>
			</div>
@endsection
