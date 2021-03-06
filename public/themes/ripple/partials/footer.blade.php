<footer data-background="{{ Theme::asset()->url('images/page-intro-01.png') }}" class="page-footer bg-dark pt-50 bg-parallax">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <aside class="widget widget--transparent widget__footer widget__about">
                    <div class="widget__content">
                        <header class="person-info">
                            <div class="person-info__thumbnail"><a href="https://botble.com"><img src="{{ Theme::asset()->url('images/men.jpg') }}" alt=""></a></div>
                            <div class="person-info__content">
                                <h3 class="person-info__title">{{ __('Botble Technologies') }}</h3>
                                <p class="person-info__description">{{ __('A young team in Vietnam') }}</p>
                            </div>
                        </header>
                        <div class="person-detail">
                            <p><i class="ion-home"></i>{{ __('Go Vap District, HCM City, Vietnam') }}</p>
                            <p><i class="ion-earth"></i><a href="https://botble.com">https://botble.com</a></p>
                            <p><i class="ion-email"></i><a href="mailto:{{ setting('email_support') }}">{{ setting('email_support') }}</a></p>
                        </div>
                    </div>
                </aside>
            </div>
            {!! dynamic_sidebar('footer_sidebar') !!}
        </div>
    </div>
    <div class="page-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="page-copyright">
                        <p>{!! __(ThemeOption::getOption('copyright')) !!}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="page-footer__social">
                        <ul class="social social--simple">
                            <li><a href="{{ setting('facebook') }}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ setting('twitter') }}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ setting('google_plus') }}" title="Google"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="back2top"><i class="fa fa-angle-up"></i></div>
</div>
<!-- JS Library-->
{!! Theme::asset()->container('footer')->scripts() !!}
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1677346255837530";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
