<!-- <div class="container">
    <h3 class="page-intro__title">{{ $page->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<div>
    {!! $page->content !!}
</div> -->


<section class="heading featured">
    <div class="container">
      <div class="heading-content" style="background: url({{url('/themes/blog/assets/images/learning-paths-heading.png')}}) right bottom no-repeat;"> 
        <div class="heading-text"> 
          <h1>{{ $page->name }}</h1>
          <p>{{ $page->description }}</p>
        </div>
      </div>
    </div>
</section>

<section class="learning-paths">
	<div class="container">
		
		<div class="row">
			
			 			@php
                            $featured = get_all_categories();
                        @endphp
                        @if (count($featured) > 0)
                        @foreach ($featured as $feature_item)
			<div class="list-item col-sm-12">
				<div class="media">
					<a class="media-left" href="{{ route('public.single.detail', $feature_item->slug) }}">
						<div class="learning-path-image-page">
							<i class="fa {{$feature_item->icon}}" aria-hidden="true"></i>
						</div>
					</a>
					<div class="media-body">
						<h3 class="path-title media-heading">
							<a href="{{ route('public.single.detail', $feature_item->slug) }}">{{ $feature_item->name }}</a>
						</h3>
						<!-- <p class="path-stats">
							<span><i class="fa fa-bookmark" aria-hidden="true"></i> <strong>Badges:</strong>
								2</span> <span><i class="fa fa-book"></i> <strong>Courses:</strong>
								3</span>
						</p> -->
						{{ $feature_item->description }}
					</div>
				</div>
			</div>
			            @endforeach
                        @endif
							
			
		</div>
	</div>
</section>