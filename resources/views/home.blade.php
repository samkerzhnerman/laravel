@extends('layouts.master')
@section('title', 'Главная')
@section('content')
		<aside id="colorlib-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					@foreach($sliderposts as $post)
					<li style="background-image: url({{ Voyager::image( $post->photo ) }});">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-9 col-xs-9 js-fullheight slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<p class="tag"><span style="background-color: black;"><?php echo ($categories[($post->category_id-1)]->name); ?></span></p>
											<h1 style="background-color: black;"><a href="/post/{{ $post->title }}">{{ $post->title }}</a></h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</aside>

		<div class="colorlib-blog">
					<div class="container-wrap">


						<div class="row">

						<ul style=" list-style:none; ">
							<li class="col-md-5" style="float: left; margin:20px;">
								<h4>Топ комментаторов:</h4>
							    @foreach($topcommenters as $topcommenter)
									<p>Пользователь <a href="/searchcomments/{{ $topcommenter->user_id }}">{{ $topcommenternames[$topcommenter->user_id-1]->name }}</a> - {{$topcommenter->countid }} комментариев</p>
								@endforeach
							</li>
							<li class="col-md-5" style="float: left;">
								<h4>Самые комментируемые новости:</h4>
								@foreach($toptodayposts as $toptodaypost)
									<p> <a href="/post/{{ $toptodaypost[0]->title }}">{{ $toptodaypost[0]->title }}</a></p>
							    @endforeach
							</li>
						</ul>
						</div>
							@foreach($categories as $category)
								<h3><span>{{ $category->name }}</span></h3>
							<!-- {{$counter=1}} -->
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
								<!--	{{++$counter}} -->
									@if ($counter>3) @break @endif
									@endif
								@endforeach
						    @endforeach
			       </div>
		</div>
			</div>

		</div>
	</div>
		@endsection

