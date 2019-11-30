@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <?php
        $title = '';
        if(str_replace('_', '-', app()->getLocale()) === 'ru') {$title = 'Бронирование';}
        if(str_replace('_', '-', app()->getLocale()) === 'en') {$title = 'Booking';}
        if(str_replace('_', '-', app()->getLocale()) === 'de') {$title = 'Reservierung';}
        if(str_replace('_', '-', app()->getLocale()) === 'uz') {$title = 'Buyurtma';}
    ?>
    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="booking-title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                        <div id="tl-booking-form">&nbsp;</div>
                        <script type="text/javascript">
                          (function(w){
                            var q=[
                              ['setContext', 'TL-INT-sayyah', "<?php echo str_replace('_', '-', app()->getLocale()) ?>"],
                              ['embed', 'booking-form', {container: 'tl-booking-form'}]
                            ];
                            var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
                            if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
                          })(window);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #colorlib-subscribe, .colorlib-social-icons, #colorlib-hero {
            display: none;
        }

        #page {
            overflow-x: visible;
        }

        .colorlib-nav {
            background: url('/img/img_bg_1.jpg') no-repeat;
            height: 120px;
            background-size: cover;
        }

        @media (min-width: 992px) {
            #colorlib-footer .col-md-push-1 {
                left: auto;
            }
        }
    </style>
@endsection