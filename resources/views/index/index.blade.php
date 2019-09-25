@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('reservation')
    @include('layouts.reservation.widget')
@endsection

@section('content')
    <div id="colorlib-services">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3 animate-box text-center aside-stretch">
                    <div class="services">
                        <span class="icon">
                        <i class="flaticon-resort"></i>
                    </span>
                        <h3>Our Hotels</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
                    </div>

                </div>
                <div class="col-md-3 animate-box text-center">
                    <div class="services">
                    <span class="icon">
                        <i class="flaticon-around"></i>
                    </span>
                        <h3>Amazing Travel</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
                    </div>
                </div>
                <div class="col-md-3 animate-box text-center">
                    <div class="services">
                    <span class="icon">
                        <i class="flaticon-car"></i>
                    </span>
                        <h3>Book Your Trip</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
                    </div>
                </div>
                <div class="col-md-3 animate-box text-center">
                    <div class="services">
                    <span class="icon">
                        <i class="flaticon-postcard"></i>
                    </span>
                        <h3>Nice Support</h3>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-tour colorlib-light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Popular Destination</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
        </div>
        <div class="tour-wrap">
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-1.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Athens, Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-2.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Thailand</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-3.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Philippines</h2>
                <span class="city">Lipa, Philippines</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-4.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-5.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-6.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-7.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
            <a href="#" class="tour-entry animate-box">
                <div class="tour-img" style="background-image: url({{ asset('img/tour-8.jpg') }});">
                </div>
                <span class="desc">
                <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                <h2>Family Tour in Greece</h2>
                <span class="city">Athens, Greece</span>
                <span class="price">$450</span>
            </span>
            </a>
        </div>
    </div>


    <div id="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Recent Blog</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="blog-flex">
                <div class="f-entry-img" style="background-image: url({{ asset('img/blog-3.jpg') }});">
                </div>
                <div class="blog-entry aside-stretch-right">
                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <a href="blog.html" class="blog-post">
                                <span class="img" style="background-image: url({{ asset('img/blog-1.jpg') }});"></span>
                                <div class="desc">
                                    <span class="date">Feb 22, 2018</span>
                                    <h3>A Definitive Guide to the Best Dining</h3>
                                    <span class="cat">Activities</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 animate-box">
                            <a href="blog.html" class="blog-post">
                                <span class="img" style="background-image: url({{ asset('img/blog-2.jpg') }});"></span>
                                <div class="desc">
                                    <span class="date">Feb 22, 2018</span>
                                    <h3>How These 5 People Found The Path to Their Dream Trip</h3>
                                    <span class="cat">Activities</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 animate-box">
                            <a href="blog.html" class="blog-post">
                                <span class="img" style="background-image: url({{ asset('img/blog-4.jpg') }});"></span>
                                <div class="desc">
                                    <span class="date">Feb 22, 2018</span>
                                    <h3>Our Secret Island Boat Tour Is just for You</h3>
                                    <span class="cat">Activities</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-intro" class="intro-img" style="background-image: url({{ asset('img/cover-img-1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 animate-box">
                    <div class="intro-desc">
                        <div class="text-salebox">
                            <div class="text-lefts">
                                <div class="sale-box">
                                    <div class="sale-box-top">
                                        <h2 class="number">45</h2>
                                        <span class="sup-1">%</span>
                                        <span class="sup-2">Off</span>
                                    </div>
                                    <h2 class="text-sale">Sale</h2>
                                </div>
                            </div>
                            <div class="text-rights">
                                <h3 class="title">Just hurry up limited offer!</h3>
                                <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                <p><a href="#" class="btn btn-primary">Book Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="video-wrap">
                        <div class="video colorlib-video" style="background-image: url({{ asset('img/img_bg_2.jpg') }});">
                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
                            <div class="video-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Recommended Hotels</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="hotel-entry">
                                <a href="hotels.html" class="hotel-img" style="background-image: url({{ asset('img/hotel-1.jpg') }});">
                                    <p class="price"><span>$120</span><small> /night</small></p>
                                </a>
                                <div class="desc">
                                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                    <h3><a href="#">Hotel Edison</a></h3>
                                    <span class="place">New York, USA</span>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="hotel-entry">
                                <a href="hotels.html" class="hotel-img" style="background-image: url({{ asset('img/hotel-2.jpg') }});">
                                    <p class="price"><span>$120</span><small> /night</small></p>
                                </a>
                                <div class="desc">
                                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                    <h3><a href="#">Hotel Edison</a></h3>
                                    <span class="place">New York, USA</span>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="hotel-entry">
                                <a href="hotels.html" class="hotel-img" style="background-image: url({{ asset('img/hotel-3.jpg') }});">
                                    <p class="price"><span>$120</span><small> /night</small></p>
                                </a>
                                <div class="desc">
                                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                    <h3><a href="#">Hotel Edison</a></h3>
                                    <span class="place">New York, USA</span>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="hotel-entry">
                                <a href="hotels.html" class="hotel-img" style="background-image: url({{ asset('img/hotel-4.jpg') }});">
                                    <p class="price"><span>$120</span><small> /night</small></p>
                                </a>
                                <div class="desc">
                                    <p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
                                    <h3><a href="#">Hotel Edison</a></h3>
                                    <span class="place">New York, USA</span>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
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

    <div class="colorlib-tour">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Most Popular Travel Countries</h2>
                    <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="f-tour">
                        <div class="row row-pb-md">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-1.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-2.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-3.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-4.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box">
                                <div class="desc">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Tashkent</h3>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Best Tours City</h4>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Tashkent</a></li>
                                                        <li><a href="#">Samarkand</a></li>
                                                        <li><a href="#">Bukhara</a></li>
                                                        <li><a href="#">Khiva</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Shahrisabz</a></li>
                                                        <li><a href="#">Aidarkul lake</a></li>
                                                        <li><a href="#">Muynak, Aral Sea</a></li>
                                                        <li><a href="#">Ancient Fortress Ruins</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Fergana Valley</a></li>
                                                        <li><a href="#">Nukus</a></li>
                                                        <li><a href="#">Margilan</a></li>
                                                        <li><a href="#">Termez</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p><a href="tours.html" class="btn btn-primary">View All Places</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="f-tour">
                        <div class="row">
                            <div class="col-md-6 col-md-push-6">
                                <div class="row">
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-5.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-6.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-7.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6 animate-box">
                                        <a  href="tours.html" class="f-tour-img" style="background-image: url({{ asset('img/tour-8.jpg') }});">
                                            <div class="desc">
                                                <h3>Rome - 5 Days</h3>
                                                <p class="price"><span>$120</span> <small>/ person</small></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 animate-box col-md-pull-6 text-right">
                                <div class="desc">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Samarkand</h3>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Best Tours City</h4>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Tashkent</a></li>
                                                        <li><a href="#">Samarkand</a></li>
                                                        <li><a href="#">Bukhara</a></li>
                                                        <li><a href="#">Khiva</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Shahrisabz</a></li>
                                                        <li><a href="#">Aidarkul lake</a></li>
                                                        <li><a href="#">Muynak, Aral Sea</a></li>
                                                        <li><a href="#">Ancient Fortress Ruins</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <ul>
                                                        <li><a href="#">Fergana Valley</a></li>
                                                        <li><a href="#">Nukus</a></li>
                                                        <li><a href="#">Margilan</a></li>
                                                        <li><a href="#">Termez</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p><a href="tours.html" class="btn btn-primary">View All Places</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection