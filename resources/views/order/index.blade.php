@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div id="colorlib-about">
        <div class="container">
            <div class="row">
                <div class="about-flex">

                    @include('layouts.sidebar')

                    <div class="col-three-forth animate-box">
                        <h2>Orders</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">Type
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Title
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Price / Payment Type
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Created Time
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($orders) && $orders->isNotempty())
                                        @foreach($orders as $order)
                                            <tr role="row" class="odd">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Type</th>
                                        <th rowspan="1" colspan="1">Title</th>
                                        <th rowspan="1" colspan="1">Price / Payment Type</th>
                                        <th rowspan="1" colspan="1">Date</th>
                                        <th rowspan="1" colspan="1">Created Time</th>
                                        <th rowspan="1" colspan="1">Status</th>
                                        <th rowspan="1" colspan="1">Action</th>
                                    </tr>
                                    </tfoot>
                                    @else
                                        <tr>
                                            <th rowspan="1" colspan="8">Order list is empty</th>
                                        </tr>
                                        </tfoot>

                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-testimony" class="colorlib-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Our Satisfied Guests says</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 animate-box">
                    <div class="owl-carousel2">
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url({{ asset('img/person1.jpg') }});"></span>
                                <span class="user">Alysha Myers</span>
                                <small>Miami Florida, USA</small>
                                <blockquote>
                                    <p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url({{ asset('img/person2.jpg') }});"></span>
                                <span class="user">James Fisher</span>
                                <small>New York, USA</small>
                                <blockquote>
                                    <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony text-center">
                                <span class="img-user" style="background-image: url({{ asset('img/person3.jpg') }});"></span>
                                <span class="user">Jacob Webb</span>
                                <small>Athens, Greece</small>
                                <blockquote>
                                    <p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
