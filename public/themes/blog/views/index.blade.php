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
								<a href="#"
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
											src="{{url('/themes/blog/assets/images/icon-benefit-free.png')}}">
									</div>
									<div class="media-body">
										<h3 class="media-heading">
											It's<br>free
										</h3>
										Our courses are free so you have nothing to lose!
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="media">
									<div class="media-left">
										<img class="media-object"
											src="{{url('/themes/blog/assets/images/icon-benefit-badge.png')}}">
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
											src="{{url('/themes/blog/assets/images/icon-benefit-knowledge.png')}}">
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
									src="{{url('/themes/blog/assets/images/icon-step-select-learning-path.png')}}" />
								<span>1) Select a Learning Path</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="{{url('/themes/blog/assets/images/icon-step-complete-course.png')}}" />
								<span>2) Complete Courses</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="{{url('/themes/blog/assets/images/icon-step-earn-badge.png')}}" />
								<span>3) Earn Badges</span>
							</div>
							<div class="col-md-3 step">
								<img
									src="{{url('/themes/blog/assets/images/icon-step-show-off.png')}}" />
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
                            $featured = get_all_categories(['featured' => '1', 'parent_id' => 0]);
                        @endphp
                        @if (count($featured) > 0)
                        @foreach ($featured as $feature_item)
                                
                            <div class="col-sm-6 col-lg-4">
								<div class="learning-path-box">
									<a href="{{ route('public.learn.detail', $feature_item->slug) }}">
										<div class="learning-path-card red">
											<div class="learning-path-image">
												<i class="fa {{$feature_item->icon}}" aria-hidden="true"></i>
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
									src="{{url('/themes/blog/assets/images/ds-social-good.png')}}" />
							</div>
							<div class="col-md-5">
								<h2>Data Science for Social Good</h2>
								<p>Check out our initiatives in support of the UN
									Sustainable Development Goals.</p>
								<a href="#" class="btn btn-bdu btn-wide">
									Learn more </a>
							</div>
						</div>
					</div>
				</section>


			</div>

