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
			
			 	 {!! $page->content !!}
							
			
		</div>
	</div>
</section>