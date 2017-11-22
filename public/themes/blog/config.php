<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('$copy; Blog');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));

            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Sentinel::getUser());
            // });

        	$theme->asset()->usePath()->add('style-stylesheet', 'css/style.css');
        	$theme->asset()->usePath()->add('style-747e3f59_ai1ec_parsed_css72e5', 'css/747e3f59_ai1ec_parsed_css72e5.css');
        	$theme->asset()->usePath()->add('style-chatbox7bcd', 'css/chatbox7bcd.css');
        	$theme->asset()->usePath()->add('style-ewd-ufaq-styles7bcd', 'css/ewd-ufaq-styles7bcd.css');
        	$theme->asset()->usePath()->add('style-jetpack5156', 'css/jetpack5156.css');
        	$theme->asset()->usePath()->add('style-rrssb-min7bcd', 'css/rrssb-min7bcd.css');
        	$theme->asset()->usePath()->add('style-social-logos.min68b3', 'css/social-logos.min68b3.css');
        	$theme->asset()->usePath()->add('style-style.min41fe', 'css/style.min41fe.css');
        	$theme->asset()->usePath()->add('style-vendor6e0e', 'css/vendor6e0e.css');

        	
        	$theme->asset()->usePath()->add('script-app6e0e', 'js/app6e0e.js');
        	$theme->asset()->usePath()->add('script-app7bcd', 'js/app7bcd.js');
        	$theme->asset()->usePath()->add('script-calendar72e5', 'js/calendar72e5.js');
        	$theme->asset()->usePath()->add('script-facebook-embed', 'js/facebook-embed.js');
        	$theme->asset()->usePath()->add('script-jquery.min', 'js/jquery.min.js');
        	$theme->asset()->usePath()->add('script-jquery-migrate.min', 'js/jquery-migrate.min.js');
        	$theme->asset()->usePath()->add('script-jquery.cookied279', 'js/jquery.cookied279.js');
        	$theme->asset()->usePath()->add('script-main', 'js/main.js');
        	$theme->asset()->usePath()->add('script-main.minc739', 'js/main.minc739.js');
        	$theme->asset()->usePath()->add('script-related-posts7f79', 'js/related-posts7f79.js');
        	$theme->asset()->usePath()->add('script-segment622c', 'js/segment622c.js');
        	$theme->asset()->usePath()->add('script-sharing5156', 'js/sharing5156.js');
        	$theme->asset()->usePath()->add('script-twitter-timelinecce7', 'js/twitter-timelinecce7.js');
        	$theme->asset()->usePath()->add('script-vendor6e0e', 'js/vendor6e0e.js');
        	$theme->asset()->usePath()->add('script-wpgroho7bcd', 'js/wpgroho7bcd.js');
        	
        	
        	
        	
            $theme->composer('page', function($view) {
                $view->withShortcodes();
            });
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }
        ]
    ]
];
