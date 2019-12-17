<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="{{ route('index') }}">SAYYAH.UZ</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="has-dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="flag-icon flag-icon-{{ \App::getLocale() }}"></i>
                            </a>
                            <ul class="dropdown">
                                @if(\App::getLocale() !== 'en')
                                    <li>
                                        <a href="{{ route('setlocale', ['lang' => 'en']) }}" class="dropdown-item active">
                                            <i class="flag-icon flag-icon-en mr-2"></i> English
                                        </a>
                                    </li>
                                @endif
                                @if(\App::getLocale() !== 'ru')
                                    <li>
                                        <a href="{{ route('setlocale', ['lang' => 'ru']) }}" class="dropdown-item">
                                            <i class="flag-icon flag-icon-ru mr-2"></i> Русский
                                        </a>
                                    </li>
                                @endif
                                @if(\App::getLocale() !== 'uz')
                                    <li>
                                        <a href="{{ route('setlocale', ['lang' => 'uz']) }}" class="dropdown-item">
                                            <i class="flag-icon flag-icon-uz mr-2"></i> O`zbek
                                        </a>
                                    </li>
                                @endif
                                @if(\App::getLocale() !== 'de')
                                    <li>
                                        <a href="{{ route('setlocale', ['lang' => 'de']) }}" class="dropdown-item">
                                            <i class="flag-icon flag-icon-de mr-2"></i> Deutsch
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('index') ? 'active' : '' }}"><a href="{{ route('index') }}">{{ __('layouts/navigation.home') }}</a></li>
                        <li class="{{ request()->routeIs('hotel.index') ? 'active' : '' }}"><a href="{{ route('hotel.index') }}">{{ __('layouts/navigation.hotel') }}</a></li>
                        <li class="{{ request()->routeIs('car.index') ? 'active' : '' }}"><a href="{{ route('car.index') }}">{{ __('layouts/navigation.cars') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.tours') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.activities') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.flight') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.train') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.about') }}</a></li>
                        <li><a href="#">{{ __('layouts/navigation.contact') }}</a></li>
                        @if(auth()->guest())
                            <li class="has-dropdown">
                                <a href="{{ route('login') }}">
                                    {{ __('layouts/navigation.login') }}
                                </a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('register') }}">{{ __('layouts/navigation.register') }} </a></li>
                                </ul>
                            </li>
                        @else
                            <li class="has-dropdown">
                                <a href="#">
                                    {{ __('layouts/navigation.dashboard') }}
                                </a>
                                <ul class="dropdown">
{{--                                    <li><a href="#"><i class="fa fa-heart"></i> {{ __('layouts/navigation.wishlist') }} </a></li>--}}
                                    <li><a href="{{ route('user.order.car.index') }}"><i class="fa fa-wpexplorer"></i> {{ __('layouts/navigation.orders') }} </a></li>
{{--                                    <li><a href="#"><i class="fa fa-bell"></i> {{ __('layouts/navigation.notification') }} </a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-cog"></i> {{ __('layouts/navigation.ettings') }} </a></li>--}}
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> {{ __('layouts/navigation.logout') }} </a></li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
