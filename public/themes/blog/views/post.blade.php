<?php
use risul\LaravelLikeComment\Facade\LaravelLikeComment;
?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
    <style>
    .ui.comments .comment .avatar img, .ui.comments .comment img.avatar {width: 38px !important; height: 38px !important;}
    </style>

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
			<div id="my-comments"></div>
                @include('laravelLikeComment::like', ['like_item_id' => $post->id])
                @include('laravelLikeComment::comment', ['comment_item_id' => $post->id])
       </section>         
	</div>
</div>
</div>