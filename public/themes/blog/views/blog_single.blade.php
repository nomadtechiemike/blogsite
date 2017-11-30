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
<aside class="sidebar2 hidden-sm-down">
	<div class="sidebar-blog">
		
		<div id="recent-posts-3" class="widget widget_recent_entries">
			<h4 class="widget-title">Popular posts</h4>
			<ul>
				@if ($popular->count() > 0)
				@foreach($popular as $p)
				<li><a href="{{ route('public.blog.single', $p->slug) }}">{{$p->name}}</a></li>
				@endforeach
				@endif
			</ul>
		</div>
		
	</div>

</aside>
<div class="content-wrapper">
	<div class="content blog">
		<div class="container">
			<div class="row">
			
			@if ($post->count() > 0)

			
			
					<article class="post-type-post" id="post-5324">
						<section class="article-content">
							<h1 class="article-h1">{{$post->name}}s</h1>
							<p class="blog-author">
								Posted on October 28, 2017 by <a
									href="#">Joseph Santarcangelo</a>
							</p>
							<div class="article-body">
								{!! $post->content !!}
								<div id="my-comments"></div>
                @include('laravelLikeComment::like', ['like_item_id' => $post->id])
                @include('laravelLikeComment::comment', ['comment_item_id' => $post->id])
							</div>
						
						</section>
						
						
					</article>
				
			
			
				

            @else
                <div>
                    <p>{{ __('There is no data to display!') }}</p>
                </div>
            @endif

			</div>
		<!--	<nav class="text-xs-center">
			 	<ul class="pagination">
					Previous button 

					<li class="page-item active"><span class="page-link"> 1 <span
							class="sr-only">(current)</span>
					</span> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/2/index.html">2</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/3/index.html">3</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/4/index.html">4</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/5/index.html">5</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/6/index.html">6</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/7/index.html">7</a> </a></li>
					<li class="page-item "><a class="page-link"
						href="page/8/index.html">8</a> </a></li>

	
					<li class="page-item  "><a class="page-link"
						href="page/2/index.html" aria-label="Next"> <span
							aria-hidden="true">&gt;</span> <span class="sr-only">Next</span>
					</a></li>
				</ul>
			</nav> -->
		</div>
		
	</div>
	
</div>


