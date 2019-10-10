<div id="colorlib-reservation">
    <!-- <div class="container"> -->
    <div class="row">
        <div class="search-wrap">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> {{ __('layouts/reservation/widget.nav_tab_hotels') }}</a></li>
                    <li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> {{ __('layouts/reservation/widget.nav_tab_cars') }} </a></li>
                    <li><a data-toggle="tab" href="#tour"><i class="flaticon-around"></i> {{ __('layouts/reservation/widget.nav_tab_tours') }}</a></li>
                    <li><a data-toggle="tab" href="#activity"><i class="flaticon-island"></i> {{ __('layouts/reservation/widget.nav_tab_activities') }}</a></li>
                    <li><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> {{ __('layouts/reservation/widget.nav_tab_flights') }}</a></li>
                    <li><a data-toggle="tab" href="#train"><i class="fa fa-train"></i> {{ __('layouts/reservation/widget.nav_tab_trains') }}</a></li>
                </ul>
            </div>
            <div class="tab-content">

                @include('layouts.reservation.widget-hotel')
                @include('layouts.reservation.widget-car')
                @include('layouts.reservation.widget-tour')
                @include('layouts.reservation.widget-activity')
                @include('layouts.reservation.widget-flight')
                @include('layouts.reservation.widget-train')

            </div>
        </div>
    </div>
</div>