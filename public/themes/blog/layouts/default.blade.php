<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        {!! SeoHelper::render() !!}

        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
    
    <body class="home page-template page-template-page-templates page-template-front page-template-page-templatesfront-php page {{$body_class}}">
		{!! Theme::partial('header') !!}
			<div class="main-wrapper">
<!-- 				<div class="main"> -->
					{!! Theme::content() !!}
<!-- 				</div> -->
			</div>

		{!! Theme::partial('footer') !!}
        
        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html> 

