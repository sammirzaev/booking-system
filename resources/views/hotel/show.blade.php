@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-division">
                                <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                    <h2>{{ (isset($hotel) && $hotel->language->title) ? $hotel->language->title : 'Hotel' }}</h2>
                                </div>
                                <div class="row">
                                @if(isset($hotel->rooms) && $hotel->rooms->isNotEmpty())
                                    @foreach($hotel->rooms as $room)
                                        <div class="col-md-12 animate-box">
                                            <div class="room-wrap">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="room-img" style="background-image: url({{
                                                       isset($room->image) && isset($room->image->name) &&
                                                       Storage::disk('public')->exists('rooms/' . $room->image->name)
                                                       ? asset("storage/rooms/" . $room->image->name)
                                                       : asset('img/default/room-l.jpg')  }});">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="desc">
                                                            <h2>{{ $room->type->first()->language->title }}</h2>
                                                            <p class="price"><span>${{ number_format($room->price) }}</span>
                                                                @if(isset($room->bonuses) && ($room->bonuses->first()))
                                                                    <small>/{{ $room->bonuses->first()->language->title }}</small>
                                                                @endif
                                                            </p>
                                                            <p>{{ Str::limit($room->language->description , 200) }}</p>
                                                            <p><span class="btn btn-primary open-modal-btn" data-id="{{ $room->id }}">Book Now!</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                        <h3>Not available rooms</h3>
                                    </div>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR-->
                <div class="col-md-3">
                    <div class="sidebar-wrap">

                        @include('layouts.reservation.sidebar-hotel')

                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Price Range</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="guests">Price from:</label>
                                                    <div class="form-field">
                                                        <i class="icon icon-arrow-down3"></i>
                                                        <select name="people" id="people" class="form-control">
                                                            <option value="#">1</option>
                                                            <option value="#">200</option>
                                                            <option value="#">300</option>
                                                            <option value="#">400</option>
                                                            <option value="#">1000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="guests">Price to:</label>
                                                    <div class="form-field">
                                                        <i class="icon icon-arrow-down3"></i>
                                                        <select name="people" id="people" class="form-control">
                                                            <option value="#">2000</option>
                                                            <option value="#">4000</option>
                                                            <option value="#">6000</option>
                                                            <option value="#">8000</option>
                                                            <option value="#">10000</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Review Rating</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star-full"></i></span></p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Categories</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Apartment</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Hotel</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Hostel</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Inn</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Villa</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Location</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Greece</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Italy</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Spain</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Germany</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Japan</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="side animate-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="sidebar-heading">Facilities</h3>
                                    <form method="post" class="colorlib-form-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Airport Transfer</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Resto Bar</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Restaurant</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Swimming Pool</h4>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <h4 class="place">Japan</h4>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.booking-room')
@endsection

@push('css')
    <style>
        .cover {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.6;
            z-index: 100;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            overflow-x: auto;
            overflow-y: scroll;
            padding: 20px;
            z-index: 200;
        }
        .content {
            display: none;
            width: 100%;
            min-width: 200px;
            width: 100%;
            position: relative;
            background-color: #2C2E3E;
            z-index: 300;
            padding: 50px 0;
        }
    </style>
@endpush

@push('js')
    <script type="text/javascript">
        $(function() {
            var room_id;
            $('#room_search').submit(function(e){
                let data = $(this).serialize();
                // console.log(data);
                e.preventDefault();

                var request = $.ajax({
                    type:'GET',
                    url:'{{ route('room.search.index') }}',
                    data: data,
                    dataType: "html"
                });
                request.done(function(msg) {
                    console.log(msg);
                   let res = JSON.parse(msg);
                    if(res.status){
                        $("#modal-status").attr('class', 'show');
                        $("#modal-error").attr('class', 'hide');
                        $("#model-checkout").attr('href', '/hotel-check-out/' + room_id);
                    }
                    else if(res.error){
                        $("#modal-status").attr('class', 'hide');
                        $("#modal-error").attr('class', 'show');
                        $("#modal-error").html( res.error );
                        $("#model-checkout").attr('href', '#');
                    }
                });

                request.fail(function(jqXHR, textStatus) {
                    alert( "Request failed: " + textStatus );
                });
            });

            // open modal
            var wrap = $('#wrapper'),
                btn = $('.open-modal-btn'),
                modal = $('.cover, .modal, .content');

            btn.on('click', function() {
                modal.fadeIn();
                room_id = btn.attr('data-id');
                $('#room_id').val(room_id);
            });

            // close modal
            $('.modal').click(function() {
                wrap.on('click', function(event) {
                    var select = $('.content');
                    if ($(event.target).closest(select).length)
                        return;
                    modal.fadeOut();
                    wrap.unbind('click');
                });
            });
        });
    </script>
@endpush