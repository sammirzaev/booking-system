@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('reservation')
    @include('layouts.reservation.widget')
@endsection

@section('content')

    @include('index.services')

    @include('index.popular_destination')

    @include('index.blog')

    @include('index.sale')

    @include('index.recommended_hotel')

    @include('index.comment')

    @include('index.popular_side')

@endsection

@push('css')
    <script type="text/javascript">
      (function(w){
        var q=[
          ['setContext', 'TL-INT-sayyah', "<?php echo str_replace('_', '-', app()->getLocale()) ?>"]
        ];
        var t=w.travelline=(w.travelline||{}),ti=t.integration=(t.integration||{});ti.__cq=ti.__cq?ti.__cq.concat(q):q;
        if (!ti.__loader){ti.__loader=true;var d=w.document,p=d.location.protocol,s=d.createElement('script');s.type='text/javascript';s.async=true;s.src=(p=='https:'?p:'http:')+'//ibe.tlintegration.com/integration/loader.js';(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(s);}
      })(window);
    </script>
    <link rel="stylesheet" href="{{ asset('css/travelline-style.css?ver=1') }}">
@endpush

