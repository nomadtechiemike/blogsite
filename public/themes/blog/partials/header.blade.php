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
						href="{{ url('/login.html') }}">Login</a></li>
					<li class="nav-item"><a class="nav-link"
						href="{{ url('/register.html') }}">Sign Up</a></li>

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
 -->
 				<ul class="nav navbar-nav pull-md-right">
					<li class="nav-item">
						<form method="get" action="#">
							<input class="search-bar" type="text" name="s" value=""
								placeholder="Explore new learning opportunities">
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>