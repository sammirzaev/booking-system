@extends('layouts.app')

@section('slides')
    @include('layouts.slides')
@endsection

@section('content')
    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <h3>Booking Confirmation</h3>
                    <form action="{{ route('hotel.checkout.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ request()->input('room_id') ? request()->input('room_id') : '' }}">
                        <input type="hidden" name="date_in" value="{{ request()->input('date_in') ? request()->input('date_in') : '' }}">
                        <input type="hidden" name="date_out" value="{{ request()->input('date_out') ? request()->input('date_out') : '' }}">
                        <input type="hidden" name="adult" value="{{ request()->input('adult') ? request()->input('adult') : '' }}">
                        <input type="hidden" name="children" value="{{ request()->input('children') ? request()->input('children') : '' }}">
                        @if(!auth()->id())
                            <div class="row form-group">
                                <div class="col-md-6 padding-bottom">
                                    <label for="first_name" class="required">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                           placeholder="Your first name" required
                                           value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="required">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                           placeholder="Your last name" required
                                           value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Your email address" required
                                           value="{{ old('email') }}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone" class="required">Telephone</label>
                                    <input type="text" name="telephone" id="telephone" class="form-control @error('telephone') is-invalid @enderror"
                                           placeholder="Your telephone" required
                                           value="{{ old('telephone') }}">
                                    @error('telephone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                           placeholder="Your address"
                                           value="{{ old('address') }}">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror"
                                           placeholder="Your postcode"
                                           value="{{ old('postcode') }}">
                                    @error('postcode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                                           placeholder="Your city"
                                           value="{{ old('city') }}">
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="region_state">Region/State</label>
                                    <input type="text" name="region_state" id="region_state" class="form-control @error('region_state') is-invalid @enderror"
                                           placeholder="Your region/state"
                                           value="{{ old('region_state') }}">
                                    @error('region_state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror"
                                           placeholder="Your country"
                                           value="{{ old('country') }}">
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="wrap-division">
                                    <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                        <h2>{{ (isset($room->hotel) && $room->hotel->language->title) ? $room->hotel->language->title : 'Hotel' }}</h2>
                                    </div>
                                    <div class="row">
                                        @if(isset($room) && $room->first())
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                                                <h3>Not available rooms</h3>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="float-right table-bordered table-hover">
                                    <tr>
                                        <td><label>Subtotal:</label></td>
                                        <td>${{ (isset($room) && $room->price) ? request()->input('adult') ? request()->input('adult')*$room->price : 1 : 'Error' }}</td>
                                    </tr>
                                    <tr>
                                        <td><label>Deposit:</label></td>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <td><label>Amount to pay:</label></td>
                                        <td>$0</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" value="Checkout" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection