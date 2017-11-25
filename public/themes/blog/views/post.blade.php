<!-- <div>
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



<div class="course course-details">
<section class="course-header bg-primary">
	<div class="container">
		<div class="course-media">
			<img src="{{ get_object_image($post->image) }}">
		</div>
		<div class="course-info">
<!-- 			<h2 class="course-org">Cognitive Class / Fireside Analytics Inc.</h2> -->
			<h1 class="course-title">{{$post->name}}</h1>
			<p class="course-headline">{{$post->description}}</p>
		</div>
	</div>
</section>


<div class="container">
	<div class="row">
		<aside class="course-summary col-lg-3 col-lg-push-9 bg-orange">
			<div class="course-social">
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

			<ul class="list-unstyled course-features" style="text-align: left;">
				<li><span class="course-feature-title"> <i class="fa fa-fw fa-book"></i>Course
						code:
				</span> <span class="course-feature-value"> BD0101EN </span></li>

				<li><span class="course-feature-title"> <i class="fa fa-fw fa-users"></i>Audience:
				</span> <span class="course-feature-value"> Anyone interested in Big
						Data </span></li>

				<li><span class="course-feature-title"> <i
						class="fa fa-fw fa-graduation-cap"></i>Course level:
				</span> <span class="course-feature-value"> Beginner </span></li>

				<li><span class="course-feature-title"> <i
						class="fa fa-fw fa-clock-o"></i>Time to complete:
				</span> <span class="course-feature-value"> 3 Hours </span></li>

				<li><span class="course-feature-title"> <i class="fa fa-fw fa-globe"></i>Language:
				</span> <span class="course-feature-value"> English </span></li>

				<li><span class="course-feature-title"> <i
						class="fa fa-fw fa-code-fork"></i>Learning path:
				</span> <a class="course-feature-value"
					href="../../learn/big-data/index.html"> Big Data Fundamentals </a>
				</li>

				<li><span class="course-feature-title"> <i
						class="fa fa-fw fa-bookmark"></i>Badge:
				</span> <a class="course-feature-value"
					href="../../badges/big-data-foundations/index.html"> Big Data
						Foundations - Level 1 </a></li>

			</ul>
		</aside>
		<section class="course-content col-lg-9 col-lg-pull-3">
			<section class="about">
				<h2>About This Course</h2>
			</section>
			<section class="about">
				{!! $post->content !!}
			</section>
			
	</div>
</div>
</div>