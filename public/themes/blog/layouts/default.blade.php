<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        {!! SeoHelper::render() !!}

        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
        
        <body class="home page-template page-template-page-templates page-template-front page-template-page-templatesfront-php page page-id-6">

	<nav class="navbar navbar-fixed-top navbar-light navbar-bdu">
		<div class="container-fluid">
			<button class="navbar-toggler hidden-md-up pull-xs-right"
				type="button" data-toggle="collapse" data-target="#collapseNavbar">
				&#9776;</button>

			<a class="navbar-brand"  href="{{ url('/') }}" title="{{ setting('site_title') }}"> 
				<img src="{{ url(ThemeOption::getOption('logo')) }}" alt="{{ setting('site_title') }}">
			</a>
			<div id="collapseNavbar" class="collapse navbar-toggleable-sm">
			
			
			{!!
            	Menu::generateMenu([
                'slug' => 'main-menu',
                'options' => ['class' => 'nav navbar-nav'],
                'view' => 'main-menu'
                ])
            !!}
			
				<ul class="nav navbar-nav pull-md-right">
					<li class="nav-item"><a class="nav-link"
						href="https://courses.cognitiveclass.ai/login">Login</a></li>
					<li class="nav-item"><a class="nav-link"
						href="https://courses.cognitiveclass.ai/register">Sign Up</a></li>

				</ul>
<!--   
				<ul class="nav navbar-nav">
					<li class="nav-item"><a class="nav-link "
						href="learn/index.html">Learning Paths</a></li>
					<li class="nav-item"><a class="nav-link "
						href="courses/index.html">Courses</a></li>
					<li class="nav-item dropdown"><a
						class="nav-link dropdown-toggle " href="#" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">   </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item " href="courses/index.html">Our
									Courses</a></li>
							<li><a class="dropdown-item "
								href="partner-courses/index.html">Partner Courses</a></li>
						</ul></li>
					<li class="nav-item"><a class="nav-link "
						href="cognitive-class-mobile-apps/index.html">Mobile Apps</a></li>
					<li class="nav-item"><a class="nav-link "
						href="badges/index.html">Badges</a></li>
					<li class="nav-item dropdown"><a
						class="nav-link dropdown-toggle " href="#" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">   </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item " href="badges/index.html">Our
									Badges</a></li>
							<li><a class="dropdown-item "
								href="badge-program/index.html">Badge Program</a></li>
						</ul></li>
					<li class="nav-item"><a class="nav-link "
						href="business/index.html">Business</a></li>
					<li class="nav-item"><a class="nav-link "
						href="https://compete.cognitiveclass.ai/">Competitions</a></li>
				</ul>

				<ul class="nav navbar-nav pull-md-right">
					<li class="nav-item">
						<form method="get" action="https://cognitiveclass.ai/">
							<input class="search-bar" type="text" name="s" value=""
								placeholder="Explore new learning opportunities">
						</form>
					</li>
				</ul> -->
			</div>
		</div>
	</nav>

	<div class="main-wrapper">
		<div class="main">
			<div class="front-page">
				<section class="heading" style="background: url({{ url(ThemeOption::getOption('top_banner', '/themes/blog/assets/images/front-heading.jpg')) }}) no-repeat #171612;">
					<div class="container"> 
						<div class="row">
							<div class="col-md-offset-6 col-md-5">
								<h1>Data Science and Cognitive Computing Courses</h1>
								<p>
									Build Data Science and Cognitive Computing skills<br> for
									free today.
								</p>
								<a href="https://courses.cognitiveclass.ai/dashboard"
									class="btn btn-bdu btn-wide"> Go to class </a>
							</div>
						</div>
					</div>
				</section>

				<section class="benefits bg-orange">
					<div class="container">
						<h2>What are the benefits?</h2>

						<div class="row">
							<div class="col-lg-4">
								<div class="media">
									<div class="media-left">
										<img class="media-object"
											src="wp-content/themes/bdu3.0/static/images/icon-benefit-free.png">
									</div>
									<div class="media-body">
										<h3 class="media-heading">
											It’s<br>free
										</h3>
										Our courses are free so you have nothing to lose!
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="media">
									<div class="media-left">
										<img class="media-object"
											src="wp-content/themes/bdu3.0/static/images/icon-benefit-badge.png">
									</div>
									<div class="media-body">
										<h3 class="media-heading">
											Earn<br>badges
										</h3>
										Earn badges for your portfolio
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="media">
									<div class="media-left">
										<img class="media-object"
											src="wp-content/themes/bdu3.0/static/images/icon-benefit-knowledge.png">
									</div>
									<div class="media-body">
										<h3 class="media-heading">Expand your knowledge</h3>
										We have courses for all skill levels
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="learning-path-steps bg-primary">
					<div class="container">
						<h2>Follow learning paths to maximize your potential</h2>
						<div class="row">
							<div class="col-md-3 step">
								<img
									src="wp-content/themes/bdu3.0/static/images/icon-step-select-learning-path.png" />
								<span>1) Select a Learning Path</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="wp-content/themes/bdu3.0/static/images/icon-step-complete-course.png" />
								<span>2) Complete Courses</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="wp-content/themes/bdu3.0/static/images/icon-step-earn-badge.png" />
								<span>3) Earn Badges</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="wp-content/themes/bdu3.0/static/images/icon-step-show-off.png" />
								<span>4) Show off your Badges</span>
							</div>
						</div>
					</div>
				</section>

				<section class="learning-paths">
					<div class="container">
						<h2>Learning Paths recommended for you</h2>
						<div class="row">
							
							
							
                    @if (Route::currentRouteName() == 'public.index')
                        @php
                            $featured = get_featured_posts(6);
                        @endphp
                        @if (count($featured) > 0)
                                @foreach ($featured as $feature_item)
                                
                                
                            <div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="{{ route('public.single.detail', $feature_item->slug) }}">
										<div class="learning-path-card red">
											<div class="learning-path-image">
												<img width="100%" height="100%"
													src="{{ get_object_image($feature_item->image) }}" />
											</div>
											<div class="learning-path-name">
												<span>{{ $feature_item->name }}</span>
											</div>
										</div>
									</a>
								</div>
							</div>
                                
                                
                                    
                                @endforeach
                        @endif
                    @endif
							
							
							
							
							
							
							
							
							
							
							<!-- 
							
							
							<div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="learn/scala/index.html">
										<div class="learning-path-card kelly-green">
											<div class="learning-path-image">
												<img
													src="wp-content/themes/bdu3.0/static/images/icon-learning-path-scala.png" />
											</div>
											<div class="learning-path-name">
												<span>Scala Programming for Data Science</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="learn/hadoop/index.html">
										<div class="learning-path-card bright-blue">
											<div class="learning-path-image">
												<img
													src="wp-content/themes/bdu3.0/static/images/icon-learning-path-hadoop.png" />
											</div>
											<div class="learning-path-name">
												<span>Hadoop Fundamentals</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="learn/spark/index.html">
										<div class="learning-path-card orange">
											<div class="learning-path-image">
												<img
													src="wp-content/themes/bdu3.0/static/images/icon-learning-path-spark.png" />
											</div>
											<div class="learning-path-name">
												<span>Spark Fundamentals</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="learn/data-science/index.html">
										<div class="learning-path-card bg-curious-blue">
											<div class="learning-path-image">
												<img
													src="wp-content/themes/bdu3.0/static/images/icon-learning-path-data-science.png" />
											</div>
											<div class="learning-path-name">
												<span>Data Science Fundamentals</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="learn/big-data-hadoop-programming/index.html">
										<div class="learning-path-card golden-yellow">
											<div class="learning-path-image">
												<img
													src="wp-content/themes/bdu3.0/static/images/icon-learning-path-hadoop.png" />
											</div>
											<div class="learning-path-name">
												<span>Hadoop Programming</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							-->
							
						</div>
					</div>
				</section>


				<section class="social-good">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<img class="img-fluid"
									src="wp-content/themes/bdu3.0/static/images/ds-social-good.png" />
							</div>
							<div class="col-md-5">
								<h2>Data Science for Social Good</h2>
								<p>Check out our initiatives in support of the UN
									Sustainable Development Goals.</p>
								<a href="socialgood/index.html" class="btn btn-bdu btn-wide">
									Learn more </a>
							</div>
						</div>
					</div>
				</section>


			</div>
		</div>
	</div>

	<footer class="footer">
		<nav class="navbar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<ul class="nav navbar-nav">
							<li class="nav-item"><a class="nav-link "
								href="about-us/index.html">About</a></li>
							<li class="nav-item"><a class="nav-link "
								href="contact/index.html">Contact</a></li>
							<li class="nav-item"><a class="nav-link "
								href="blog/index.html">Blog</a></li>
							<li class="nav-item"><a class="nav-link "
								href="business/index.html">For Business</a></li>
							<li class="nav-item"><a class="nav-link "
								href="events/index.html">Events</a></li>
							<li class="nav-item"><a class="nav-link "
								href="https://bigdatauniversity.com/resources/">Resources</a></li>
							<li class="nav-item"><a class="nav-link "
								href="faq/index.html">FAQ</a></li>
							<li class="nav-item"><a class="nav-link "
								href="legal/index.html">Legal</a></li>
						</ul>
					</div>
					<div class="col-md-4 social">
						<h6>Follow us</h6>
						<ul class="list-inline social-button-list">
							<li class="list-inline-item"><a class="social-button"
								aria-label="Facebook"
								href="https://www.facebook.com/cognitiveclass" target="_blank">
									<i class="fa fa-facebook" aria-hidden="true"></i>
							</a></li>
							<li class="list-inline-item"><a class="social-button"
								aria-label="Facebook" href="https://twitter.com/cognitiveclass"
								target="_blank"> <i class="fa fa-twitter" aria-hidden="true"></i>
							</a></li>
							<li class="list-inline-item"><a class="social-button"
								aria-label="Facebook"
								href="https://plus.google.com/+Bigdatauniversity"
								target="_blank"> <i class="fa fa-google-plus"
									aria-hidden="true"></i>
							</a></li>
							<li class="list-inline-item"><a class="social-button"
								aria-label="Facebook"
								href="https://www.linkedin.com/company/cognitiveclass"
								target="_blank"> <i class="fa fa-linkedin"
									aria-hidden="true"></i>
							</a></li>
							<li class="list-inline-item"><a class="social-button"
								aria-label="Facebook"
								href="https://www.youtube.com/user/TheBigDataUniversity"
								target="_blank"> <i class="fa fa-youtube" aria-hidden="true"></i>
							</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<ul class="nav navbar-nav pull-md-right flags">

							<li><a href="https://www.bigdatauniversity.com.br/"
								target="_blank"> <img
									src="wp-content/themes/bdu3.0/static/images/blank.gif"
									class="flag flag-br" />
							</a></li>
							<li><a href="https://bigdatauniversity.com.cn/"
								target="_blank"> <img
									src="wp-content/themes/bdu3.0/static/images/blank.gif"
									class="flag flag-cn" />
							</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</footer>
        
        
        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html> 

