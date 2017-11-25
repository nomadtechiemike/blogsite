<!--  
<div>
    <h3>{{ $category->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<div>
    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <article>
                <div>
                    <a href="{{ route('public.single.detail', $post->slug) }}"><img src="{{ url($post->image) }}" alt="{{ $post->name }}"></a>
                </div>
                <div>
                    <header>
                        <h3><a href="{{ route('public.single.detail', $post->slug) }}">{{ $post->name }}</a></h3>
                        <div><span><a href="#">{{ date_from_database($post->created_at, 'M d, Y') }}</a></span><a href="{{ route('public.author', $post->user->username) }}">{{ $post->user->getFullName() }}</a> - <a href="{{ route('public.single.detail', $category->slug) }}">{{ $category->name }}</a></div>
                    </header>
                    <div>
                        <p>{{ $post->description }}</p>
                    </div>
                </div>
            </article>
        @endforeach
        <div>
            {!! $posts->links() !!}
        </div>
    @else
        <div>
            <p>{{ __('There is no data to display!') }}</p>
        </div>
    @endif
</div>
-->

<section class="heading bg-primary">
	<div class="container">
		<h1>{{ $category->name }}</h1>
		<p class="path-headline">{{ $category->description }}</p>
	</div>
</section>

<div class="container">
	<div class="row">
		<aside class="path-summary col-lg-3 col-lg-push-9">
			<div class="path-social">
				<h2>Tell your friends</h2>
				<ul class="list-inline social-button-list">
					<li class="list-inline-item"><a href="#"
						class="social-button social-button-blue share-facebook"> <i
							class="fa fa-facebook"></i>
					</a></li>
					<li class="list-inline-item"><a href="#"
						class="social-button social-button-blue share-twitter"> <i
							class="fa fa-twitter"></i>
					</a></li>
					<li class="list-inline-item"><a href="#"
						class="social-button social-button-blue share-google-plus"> <i
							class="fa fa-google-plus"></i>
					</a></li>
					<li class="list-inline-item"><a href="#"
						class="social-button social-button-blue share-linkedin"> <i
							class="fa fa-linkedin"></i>
					</a></li>
				</ul>
			</div>

			<ul class="list-unstyled path-features">
				<li><span class="path-feature-title"> <i class="fa fa-fw fa-users"></i>Audience:
				</span> <span class="path-feature-value"> Big Data Enthusiasts, Data
						Engineers, Data Scientists </span></li>

				<li><span class="path-feature-title"> <i
						class="fa fa-fw fa-graduation-cap"></i>Learning Path Level:
				</span> <span class="path-feature-value"> Beginner </span></li>

				<li><span class="path-feature-title"> <i
						class="fa fa-fw fa-bookmark"></i>4 Badges
				</span></li>

				<li><span class="path-feature-title"> <i class="fa fa-fw fa-book"></i>3
						Courses
				</span></li>

			</ul>
		</aside>

		<div class="col-lg-9 col-lg-pull-3 path-content-wrapper">
			

			<section class="path-courses ">
				<h2>Courses</h2>
    @if ($posts->count() > 0)
    	@php $i = 0 @endphp
        @foreach ($posts as $post)
				<div class="path-step">
					<div class="node ">
						<a href="{{ route('public.single.detail', $post->slug) }}"> <img
							class="badge" alt="{{ $post->name }}"
							title="{{ $post->name }}"
							src="{{ get_object_image($post->image) }}">
						</a>
					</div>
					<article class="path-step-block path-course">
						<div class="path-step-header">
							<h3>
								<a class="" data-toggle="collapse" href="#course3800{{$i}}"
									aria-expanded="true" aria-controls="course3800">{{ $post->name }}<i
									class="collapse-icon fa fa-caret-down" aria-hidden="true"></i>
								</a>
							</h3>
							
						</div>
						<div id="course3800{{$i}}" class="path-course-block collapse in">
														<div class="path-course-description">
								<div class="path-course-description-title">About the course</div>
								<p>{{$post->description}}</p>

							</div>

							<div class="path-course-actions">
								<a class="btn btn-primary"
									href="{{ route('public.single.detail', $post->slug) }}">Learn more</a>
							</div>
						</div>
					</article>
				</div>
				@php $i++ @endphp
				  @endforeach
				    <div>
            			{!! $posts->links() !!}
        			</div>
				  
            @else
                <div>
                    <p>{{ __('There is no data to display!') }}</p>
                </div>
            @endif
				
				
				
			</section>

			
		</div>
	</div>
</div>

