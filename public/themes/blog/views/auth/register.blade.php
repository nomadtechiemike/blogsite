<div class="section-bkg-wrapper">
	<div id="login-and-registration-container" class="login-register">
		
		@if (isset($errors) and count($errors) > 0)
			@php $error = '' @endphp
		@else
			@php $error = 'hidden' @endphp
		@endif
		
		@if(Session::has('message'))
			@php $success = '' @endphp
		@else	
			@php $success = 'hidden' @endphp
		@endif

		<section id="register-anchor" class="form-type">
			<div id="register-form" class="form-wrapper ">
			
				<div class="js-reset-success status submission-success {{$success}}">
					<h4 class="message-title">Account Activation Email Sent</h4>
						<div class="message-copy">
							<p>We've sent instructions for activating your account to the
								email address you provided.</p>
						</div>
					</div>
				
			
				<div class="status submission-error {{$error}}" aria-live="polite">
					<h4 class="message-title">We couldn't create your account.</h4>
					@if (isset($errors) and count($errors) > 0)
					<ul class="message-copy">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					@endif
				</div>

				<form id="register" class="register-form" autocomplete="off" method="post" tabindex="-1" action="{{ route('public.register.user') }}">
				{!! csrf_field() !!}
						<div class="login-providers">
							<div class="section-title lines">
								<h2>
									<span class="text">Register</span>
								</h2>
							</div>
						</div>

					<div class="form-field text-username  <?php echo (isset($errors) and $errors->has('first_name')) ? 'submission-error' : ''; ?>">
						<label for="register-username"> First Name *</label> <input
							id="register-username" type="text" name="first_name"
							class="input-block "  
							placeholder="First Name" value="{{ old('first_name') }}"> 
					</div>

					<div class="form-field text-username <?php echo (isset($errors) and $errors->has('last_name')) ? 'submission-error' : ''; ?>">
						<label for="register-username"> Last Name *</label> <input
							id="register-username" type="text" name="last_name"
							class="input-block " minlength="2" maxlength="30" 
							placeholder="Last Name" value="{{ old('last_name') }}"> 
					</div>


					<div class="form-field email-email <?php echo (isset($errors) and $errors->has('email')) ? 'submission-error' : ''; ?>">

						<label for="register-email"> Email *</label> <input
							id="register-email" type="email" name="email"
							class="input-block " minlength="3" maxlength="254" aria-required="true" required=""
							placeholder="username@domain.com" value="{{ old('email') }}">
					</div>
					
					<div class="form-field email-email <?php echo (isset($errors) and $errors->has('phone')) ? 'submission-error' : ''; ?>">

						<label for="register-email"> Phone *</label> <input
							id="register-email" type="number" name="phone"
							class="input-block " minlength="3" maxlength="254" aria-required="true" required=""
							placeholder="" value="{{ old('phone') }}">
					</div>


					<div class="form-field text-username <?php echo (isset($errors) and $errors->has('username')) ? 'submission-error' : ''; ?>">
						<label for="register-username"> Public username *</label> <input
							id="register-username" type="text" name="username"
							class="input-block " minlength="2" maxlength="30" 
							placeholder="JaneDoe" value="{{ old('username') }}"> 
					</div>


					<div class="form-field password-password">
						<label for="register-password"> Password *</label> <input
							id="register-password" type="password" name="password"
							class="input-block " minlength="2" maxlength="75"
							aria-required="true" required="" value="">
					</div>

					<div class="form-field password-password">
						<label for="register-password">Confirm Password *</label> <input
							id="register-password" type="password" name="password_confirmation"
							class="input-block " minlength="2" maxlength="75"
							aria-required="true" required="" value="">
					</div>


					<div class="form-field checkbox-honor_code">

						<div class="g-recaptcha" data-sitekey="6LfGCDcUAAAAAMvJ4IWH4Cf2Z9UB8ufwfqdwGscy"></div>
						 {!! NoCaptcha::renderJs() !!}
							{!! NoCaptcha::display() !!}
							<div style="clear:both"></div>
					</div>

					


					<p class="note">* Required field</p>
					<button type="submit"
						class="action action-primary action-update js-register register-button">Create
						your account</button>
				</form>
</div>

				<div class="toggle-form">
					<a class="sign-up-button form-toggle" data-type="login">LOG IN
						INSTEAD</a>
				</div>

			
		</section>

		

	</div>











	


</div>