<div class="row mt-4">
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="hotel">Select hotel</label>
            <select name="hotel" id="hotel" required class="form-control select2 @error("hotel") is-invalid @enderror" data-placeholder="Select a hotel">
                @if(isset($hotels) && $hotels->isNotEmpty())
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}"
                                @if(isset($room->hotel_id) && ($room->hotel_id === $hotel->id))
                                selected
                                @endif
                                @if(old("hotel") === $hotel->id)
                                selected
                                @endif
                        >{{ $hotel->language->title }}</option>
                    @endforeach
                @endif
            </select>
            @error("hotel")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="roomType">Select room type </label>
            <select name="roomType" id="roomType" required class="form-control select2 @error("roomTypes") is-invalid @enderror" data-placeholder="Select a room type">
                @if(isset($roomTypes) && $roomTypes->isNotEmpty())
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}"
                                @if(isset($room->type) && ($room->type->first()->id === $roomType->id))
                                selected
                                @endif
                                @if(old("roomTypes") === $roomType->id)
                                selected
                                @endif
                        >{{ $roomType->language->title }}</option>
                    @endforeach
                @endif
            </select>
            @error("roomTypes")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-4">
        <label for="mainSort">Sort</label>
        <input type="number" class="form-control @error("mainSort") is-invalid @enderror" name="mainSort" min="1" id="mainSort"
               value="{{ ((isset($room) && isset($room->sort)) ? $room->star : old("mainSort")) ?? 1 }}">
        @error("mainSort")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="mainPrice">Price</label>
        <input type="text" class="form-control @error("mainPrice") is-invalid @enderror" name="mainPrice" id="mainPrice"
               value="{{ (isset($room) && isset($room->price)) ? $room->price : old("mainPrice") }}" min="1" required>
        @error("mainPrice")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="col-md-4">
        <div class="form-group">
            <label for="mainBookingOption">Select booking option </label>
            <select name="mainBookingOption" id="mainBookingOption" class="form-control @error("mainBookingOption") is-invalid @enderror">
                @foreach(config('booking.room.booking_option') as $key => $bookingOption)
                    <option value="{{ $bookingOption['code'] }}"
                            @if(isset($room->booking_option) && ($room->booking_option == $bookingOption['code']))
                            selected
                            @endif
                            @if(old("mainBookingOption") == $bookingOption['code'])
                            selected
                            @endif
                    >{{ $key }}: {{ $bookingOption['title'] }}</option>
                @endforeach
            </select>
            @error("mainBookingOption")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="mainPaymentType">Select payment type </label>
            <select name="mainPaymentType" id="mainPaymentType" class="form-control @error("mainPaymentType") is-invalid @enderror">
                @foreach(config('booking.room.payment_type') as $key => $paymentType)
                    <option value="{{ $paymentType['code'] }}"
                            @if(old("mainPaymentType") == $paymentType['code'])
                            selected
                            @endif
                            @if(isset($room->booking_option) && ($room->booking_option == $paymentType['code']))
                            selected
                            @endif
                    >{{ $key }}: {{ $paymentType['title'] }}</option>
                @endforeach
            </select>
            @error("mainPaymentType")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-4">
        <label for="mainBookingValue">Booking value</label>
        <input type="number" class="form-control @error("mainBookingValue") is-invalid @enderror" name="mainBookingValue" id="mainBookingValue"
               value="{{ (isset($room) && isset($room->booking_value)) ? $room->booking_value : old("mainBookingValue") }}" min="1">
        @error("mainBookingValue")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="mainCancelBookingValue">Cancel Booking value</label>
        <input type="number" class="form-control @error("mainCancelBookingValue") is-invalid @enderror" name="mainCancelBookingValue" id="mainCancelBookingValue"
               value="{{ (isset($room) && isset($room->cancel_booking_value)) ? $room->cancel_booking_value : old("mainCancelBookingValue") }}" min="1">
        @error("mainCancelBookingValue")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label for="mainDiscountValue">Discount value</label>
        <input type="number" class="form-control @error("mainDiscountValue") is-invalid @enderror" name="mainDiscountValue" id="mainDiscountValue"
               value="{{ (isset($room) && isset($room->discount_value)) ? $room->discount_value : old("mainDiscountValue") }}" min="1">
        @error("mainDiscountValue")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>


@foreach(config('settings.locales') as $locale)
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Language {{ strtoupper($locale) }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mt-3">
                    <label class="required" for="mainDescription[{{ $locale }}]">
                        Description {{ strtoupper($locale) }}
                    </label>
                    <textarea class="form-control @error("mainDescription.$locale") is-invalid @enderror" name="mainDescription[{{ $locale }}]" rows="5"
                              id="mainDescription[{{ $locale }}]" required>{{ ((isset($room) && isset(current(current($room->languages->where('lang', $locale)))->description)) ?
                   current(current($room->languages->where('lang', $locale)))->description : old("mainDescription.$locale")) ?? 'Enter Room Description' . strtoupper($locale) }}</textarea>
                    @error("mainDescription.$locale")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="row mt-3">
    <div class="col-12 mt-3">
        <label for="mainNotes">Notes</label>
        <textarea class="form-control @error("mainNotes") is-invalid @enderror" name="mainNotes" id="mainNotes" rows="5" placeholder="Notes only for employer">{{ (isset($room) && isset($room->notes)) ? $room->notes : old("mainNotes") }}</textarea>
        @error("mainNotes")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
