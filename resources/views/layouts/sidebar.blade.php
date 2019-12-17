<div class="col-one-forth aside-stretch animate-box">
    <div class="row">
        <div class="col-md-12 about">
            <h2>{{ __('layouts/navigation.dashboard') }}</h2>
            <ul>
{{--                <li><a href="#">{{ __('layouts/navigation.wishlist') }} <span class="media-left"></span><i class="fa fa-heart"></i></a></li>--}}
                <li><a href="{{ route('user.order.car.index') }}">{{ __('layouts/navigation.orders') }} <span class="media-left"></span><i class="ml-4 fa fa-wpexplorer"></i></a></li>
{{--                <li><a href="#">{{ __('layouts/navigation.notification') }} <i class="ml-4 fa fa-bell"></i></a></li>--}}
{{--                <li><a href="#">{{ __('layouts/navigation.settings') }} <span class="media-left"></span><i class="fa fa-cog"></i></a></li>--}}
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('layouts/navigation.logout') }} <span class="media-left"></span><i class="fa fa-key"></i></a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
