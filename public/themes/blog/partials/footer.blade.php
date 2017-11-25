<footer class="footer">
		<nav class="navbar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						
						{!!
			            	Menu::generateMenu([
			                'slug' => 'footer-menu',
			                'options' => ['class' => 'nav navbar-nav'],
			                'view' => 'footer-menu'
			                ])
           				!!}
						
						
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
					
				</div>
			</div>
		</nav>
	</footer>