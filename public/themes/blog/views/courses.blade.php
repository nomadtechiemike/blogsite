{{--  <div>
    <h3>{{ $post->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<header>
    <h3>{{ $post->name }}</h3>
    <div>
        @if (!$post->categories->isEmpty())
            <span>
                <a href="{{ route('public.single.detail', $post->categories->first()->slug) }}">{{ $post->categories->first()->name }}</a>
            </span>
        @endif
        <span><a href="#">{{ date_from_database($post->created_at, 'M d, Y') }}</a></span>
        <span><a href="{{ route('public.author', $post->user->username) }}">{{ $post->user->getFullName() }}</a></span>

        @if (!$post->tags->isEmpty())
            <span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('public.tag', $tag->slug) }}">{{ $tag->name }}</a>
                @endforeach
            </span>
        @endif
    </div>
</header>
{!! $post->content !!}
<footer>
    @foreach (get_related_posts($post->slug, 2) as $related_item)
        <div>
            <article>
                <div><a href="{{ route('public.single.detail', $related_item->slug) }}"></a>
                    <img src="{{ url($related_item->image) }}" alt="{{ $related_item->name }}">
                </div>
                <header><a href="{{ route('public.single.detail', $related_item->slug) }}"> {{ $related_item->name }}</a></header>
            </article>
        </div>
    @endforeach
</footer> -->

--}}

	<div class="content">
		<div class="container">
			<h1 class="page-title">Courses</h1>

			<div class="row">

			@if ($posts->count() > 0)
	        @foreach ($posts as $post)

				<div class="col-xl-3 col-lg-4 col-md-6">
					<article class="course card">
						<div class="card-img-wrapper">
							<a href="{{ route('public.single.detail', $post->slug) }}"
								class="segment-click-track"
								data-segment-event-property='{"action": "Visited", "objectType": "Course", "object": "Blockchain Essentials", "customName3": "CourseCode", "customValue3": "BC0101EN"}'>
								<img class="card-img-top"
								src="{{ get_object_image($post->image) }}"
								alt="Course image">
							</a>
						</div>
						<div class="card-block">
							<h4 class="card-title">
								<a href="{{ route('public.single.detail', $post->slug) }}"
									class="segment-click-track"
									data-segment-event-property='{"action": "Visited", "objectType": "Course", "object": "Blockchain Essentials", "customName3": "CourseCode", "customValue3": "BC0101EN"}'>
									{{ $post->name }} </a> <small class="text-muted">

									 <div class="course-org-code">
										<span class="course-org"> {{ $post->description }}</span> <!-- <span
											class="course-code"> BC0101EN </span> -->
									</div>

									<!-- <div class="course-level">
										<i class="fa fa-stop course-level-indicator"></i> <i
											class="fa fa-stop course-level-placeholder"></i> <i
											class="fa fa-stop course-level-placeholder"></i> Beginner

									</div> -->
								</small>
							</h4>

						</div>
					</article>
				</div>
				  @endforeach
            @else
                <div>
                    <p>{{ __('There is no data to display!') }}</p>
                </div>
            @endif

				

				


				<div class="clearfix hidden-lg-down"></div>
				<div class="clearfix hidden-md-down hidden-xl-up"></div>
				<div class="clearfix hidden-sm-down hidden-lg-up"></div>

			</div>

<!-- 			<nav class="text-xs-center"> -->
<!-- 				<ul class="pagination"> -->
					<!-- Previous button -->

					<!-- Pages buttons -->
<!-- 					<li class="page-item active"><span class="page-link"> 1 <span -->
<!-- 							class="sr-only">(current)</span> -->
<!-- 					</span> </a></li> -->
<!-- 					<li class="page-item "><a class="page-link" -->
<!-- 						href="page/2/index.html">2</a> </a></li> -->
<!-- 					<li class="page-item "><a class="page-link" -->
<!-- 						href="page/3/index.html">3</a> </a></li> -->

					<!-- Next button -->
<!-- 					<li class="page-item  "><a class="page-link" -->
<!-- 						href="page/2/index.html" aria-label="Next"> <span -->
<!-- 							aria-hidden="true">&gt;</span> <span class="sr-only">Next</span> -->
<!-- 					</a></li> -->
<!-- 				</ul> -->
<!-- 			</nav> -->
		</div>


	