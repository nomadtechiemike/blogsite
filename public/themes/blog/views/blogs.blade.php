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
			
			@if ($posts->count() > 0)
	        @foreach ($posts as $post)
			
			<div class="col-xl-3 col-lg-4 col-md-6">
					<article class="course card">
						<div class="card-img-wrapper">
							<a href="{{ route('public.blog.single', $post->slug) }}"
								class="segment-click-track"
								data-segment-event-property='{"action": "Visited", "objectType": "Course", "object": "Blockchain Essentials", "customName3": "CourseCode", "customValue3": "BC0101EN"}'>
								<img class="card-img-top"
								src="{{ get_object_image($post->image) }}"
								alt="Course image">
							</a>
						</div>
						<div class="card-block">
							<h4 class="card-title">
								<a href="{{ route('public.blog.single', $post->slug) }}"
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


