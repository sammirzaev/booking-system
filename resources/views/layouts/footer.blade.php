<footer id="colorlib-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3 colorlib-widget">
                <h4>sayyah.uz</h4>
                <p>{{ __('layouts/footer.main_text') }}</p>
                <p>
                <ul class="colorlib-social-icons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
                </p>
            </div>
            <div class="col-md-2 colorlib-widget">
                <h4>{{ __('layouts/footer.second_title') }}</h4>
                <p>
                <ul class="colorlib-footer-links">
                    <li><a href="{{ route('hotel.index') }}">{{ __('layouts/footer.hotel') }}</a></li>
                    <li><a href="{{ route('car.index') }}">{{ __('layouts/footer.cars') }}</a></li>
                    <li><a href="#">{{ __('layouts/footer.tours') }}</a></li>
                    <li><a href="#">{{ __('layouts/footer.activities') }}</a></li>
                </ul>
                </p>
            </div>
            <div class="col-md-2 colorlib-widget">
                <h4>{{ __('layouts/footer.third_title') }}</h4>
                <p>
                <ul class="colorlib-footer-links">
                    <li><a href="{{ route('hotel.index') }}">{{ __('layouts/footer.third_one') }}</a></li>
{{--                    <li><a href="#">Quality Suites</a></li>--}}
{{--                    <li><a href="#">The Hotel Zephyr</a></li>--}}
{{--                    <li><a href="#">Da Vinci Villa</a></li>--}}
{{--                    <li><a href="#">Hotel Epikk</a></li>--}}
                </ul>
                </p>
            </div>
            <div class="col-md-2">
                <h4>{{ __('layouts/footer.fourth_title') }}</h4>
{{--                <ul class="colorlib-footer-links">--}}
{{--                    <li><a href="#">The Ultimate Packing List For Female Travelers</a></li>--}}
{{--                    <li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>--}}
{{--                    <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>--}}
{{--                </ul>--}}
            </div>

            <div class="col-md-3 col-md-push-1">
                <h4>{{ __('layouts/footer.fifth_title') }}</h4>
                <ul class="colorlib-footer-links">
                    <li>{{ __('layouts/footer.fifth_one') }}<br>{{ __('layouts/footer.fifth_two') }}</li>
                    <li><a href="tel://9989779010770">+ 99897 790 07 70</a></li>
                    <li><a href="mailto:uzsayyah@gmail.com">uzsayyah@gmail.com</a></li>
                    <li><a href="{{ config('app.url') }}">{{ env('APP_NAME') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    {{ __('layouts/footer.copyright') }} &copy; 2018 - <script>document.write(new Date().getFullYear());</script> {{ __('layouts/footer.copyright_text') }} <a href="{{ config('app.url', '#') }}" target="_blank">sayyah.uz</a>
                </p>
            </div>
        </div>
    </div>
</footer>
