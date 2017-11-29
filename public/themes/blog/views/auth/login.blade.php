	<div class="section-bkg-wrapper">
		<div id="login-and-registration-container" class="login-register">
			<section id="login-anchor" class="form-type">
				<div id="login-form" class="form-wrapper ">
					<div class="status already-authenticated-msg hidden"></div>

					<div class="js-reset-success status submission-success hidden">
						<h4 class="message-title">Password Reset Email Sent</h4>
						<div class="message-copy">
							<p>We've sent instructions for resetting your password to the
								email address you provided.</p>
						</div>
					</div>

					<div class="status submission-error hidden" aria-live="polite">
						<h4 class="message-title">We couldn't sign you in.</h4>
						<ul class="message-copy"></ul>
					</div>

					<form id="login" class="login-form" tabindex="-1">

						<div class="login-providers">
							<div class="section-title lines">
								<h2>
									<span class="text">Login</span>
								</h2>
							</div>
						</div>


						<p class="sr">Login here using your email address and password, or
							use one of the providers listed below. If you do not yet have an
							account, use the button below to register.</p>


						<div class="form-field email-email">

							<label for="login-email"> Email </label> <input id="login-email"
								type="email" name="email" class="input-block "
								aria-describedby="login-email-desc" minlength="3"
								maxlength="254" aria-required="true" required=""
								placeholder="Email Address" value=""> <span
								class="tip tip-input" id="login-email-desc">The email address
								you used to register</span>



						</div>


						<div class="form-field password-password">

							<label for="login-password"> Password </label> <input
								id="login-password" type="password" name="password"
								class="input-block " minlength="2" maxlength="75"
								aria-required="true" required="" placeholder="Password" value="">

							<a href="#" class="forgot-password field-link">Forgot password?</a>

						</div>


						<div class="form-field checkbox-remember">



							<input id="login-remember" type="checkbox" name="remember"
								class="input-block checkbox"
								aria-describedby="login-remember-desc" value="false"> <label
								for="login-remember"> Remember me </label>

						</div>
						<button type="submit"
							class="action action-primary action-update js-login login-button">Log
							In</button>
					</form>

					<div class="toggle-form">
						<a class="sign-up-button form-toggle" data-type="register">DON'T
							HAVE AN ACCOUNT? SIGN UP!</a>
					</div>

				</div>
			</section>
			
		</div>
	</div>
		