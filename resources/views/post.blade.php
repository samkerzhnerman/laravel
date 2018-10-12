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
									<h2 class="heading-2">{{count($comments)}} комментариев</h2>
									@foreach ($comments as $comment)
									<div class="review">
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
											<p>

											<h4>Likes: {{$comment->likes}}</h4>

											<ul style=" list-style:none; ">
											<li style="float: left;"><form method="post" action="/like/{{$comment->id}}">
													{{csrf_field()}}
													<input type="hidden" id="likes" name="likes" value="{{$comment->likes}}">
													<input type="hidden" id="title" name="title" value="{{ $post->title }}">
													<button type="submit" class="btn" style="background-color: #5cb85c;">Like</button>
												</form></li>
											<li style="float: left;"><form method="post" action="/unlike/{{$comment->id}}">
													{{csrf_field()}}
													<input type="hidden" id="likes" name="likes" value="{{$comment->likes}}">
													<input type="hidden" id="title" name="title" value="{{ $post->title }}">
													<button type="submit" class="btn" style="background-color: #e50011;">Unlike</button>
												</form></li>
											</ul>
											</div>

											</p>

										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="row">
								<div class="col-md-11" style="margin-left:300px;">
									@guest
											<h2 class="heading-2">Комментарии могут вводить только зарегистрированные пользователи!</h2>
										</div>
									@else
									<h2 class="heading-2">Ваш комментарий:</h2>
									<form method="post" action="/addcomment/{{ $post->id }}">
										{{ csrf_field() }}
										<div class="row form-group">
											<div class="col-md-12">
												<input type="hidden" id="username" name="username" value="{{ Auth::user()->name }}">
												<input type="hidden" id="news_id" name="news_id" value="{{ $post->id }}">
												<input type="hidden" id="title" name="title" value="{{ $post->title }}">
												<input type="hidden" id="category_id" name="category_id" value="{{ $post->category_id }}">
												<textarea name="comment" id="message" cols="20" rows="10" class="form-control" placeholder="Введите сюда свой комментарий"></textarea>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" value="Отправить" class="btn btn-primary">
										</div>
									</form>
									@endguest
								</div>
							</div>
						</div>
					</div>





				</div>
			</div>
@endsection
