@if(isset($hotels) && $hotels->isNotEmpty())
    <div id="colorlib-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>{{__('index/recommended_hotel.title')}}</h2>
                    <p>{{__('index/recommended_hotel.text')}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="owl-carousel">
                        @foreach($hotels as $hotel)
                            <div class="item">
                                <div class="hotel-entry">
                                    <a href="{{ route('hotel.show', $hotel) }}" class="hotel-img"
                                       style="background-image: url({{
                                           isset($hotel->image) && isset($hotel->image->name) &&
                                           Storage::disk('public')->exists('hotels/' . $hotel->image->name)
                                           ? asset("storage/hotels/" . $hotel->image->name)
                                           : asset('img/default/hotel.jpg')  }});"
                                    >
                                        <p class="price"><span>${{ number_format($hotel->price_from) }}</span>
                                            @if(isset($hotel->bonuses) && isset(current(current($hotel->bonuses->load('language')))->language->title))
                                                <small>/{{ current(current($hotel->bonuses->load('language')))->language->title }}</small>
                                            @endif
                                        </p>
                                    </a>
                                    <div class="desc">
                                        <p class="star"><span>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full"></i>
                                                    <i class="icon-star-full">
                                                    </i></span> {{ __('index/recommended_hotel.good_reviews') }}</p>
                                        <h3><a href="{{ route('hotel.show', $hotel) }}">{{ $hotel->language->title }}</a></h3>
                                        <span class="place">{{ $hotel->language->address }}</span>
                                        <p>{{ \Str::limit($hotel->language->description, 100) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
