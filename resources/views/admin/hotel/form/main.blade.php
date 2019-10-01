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
                <div class="col-6">
                    <label class="required" for="mainTitle[{{ $locale }}]">
                        Name {{ strtoupper($locale) }}
                    </label>
                    <input class="form-control @error("mainTitle.$locale") is-invalid @enderror" type="text" name="mainTitle[{{ $locale }}]"
                           placeholder="Enter Hotel Name" id="mainTitle[{{ $locale }}]"
                           value="{{ (isset($hotel) && isset(current(current($hotel->languages->where('lang', $locale)))->title)) ?
                   current(current($hotel->languages->where('lang', $locale)))->title : old("mainTitle.$locale") }}" required>
                    @error("mainTitle.$locale")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="required" for="mainAddress[{{ $locale }}]">
                        Address {{ strtoupper($locale) }}
                    </label>
                    <input class="form-control @error("mainAddress.$locale") is-invalid @enderror" type="text" name="mainAddress[{{ $locale }}]"
                           placeholder="Enter Hotel Address" id="mainAddress[{{ $locale }}]"
                           value="{{ (isset($hotel) && isset(current(current($hotel->languages->where('lang', $locale)))->address)) ?
                   current(current($hotel->languages->where('lang', $locale)))->address : old("mainAddress.$locale") }}" required>
                    @error("mainAddress.$locale")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12 mt-3">
                    <label class="required" for="mainDescription[{{ $locale }}]">
                        Description {{ strtoupper($locale) }}
                    </label>
                    <textarea class="form-control @error("mainDescription.$locale") is-invalid @enderror" name="mainDescription[{{ $locale }}]" rows="5"
                              id="mainDescription[{{ $locale }}]" required> {{ ((isset($hotel) && isset(current(current($hotel->languages->where('lang', $locale)))->description)) ?
                   current(current($hotel->languages->where('lang', $locale)))->description : old("mainDescription.$locale")) ?? 'Enter Hotel Description' . strtoupper($locale) }}
            </textarea>
                    @error("mainDescription.$locale")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <hr>
@endforeach

<div class="row mt-3">
    <div class="col-4">
        <label for="mainStar">Star</label>
        <input type="number" class="form-control @error("mainStar") is-invalid @enderror" name="mainStar" min="1" max="5" id="mainStar"
               value="{{ (isset($hotel) && isset($hotel->star)) ? $hotel->star : old("mainStar") }}">
        @error("mainStar")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="mainSort">Sort</label>
        <input type="number" class="form-control @error("mainSort") is-invalid @enderror" name="mainSort" min="1" id="mainSort"
               value="{{ ((isset($hotel) && isset($hotel->sort)) ? $hotel->star : old("mainSort")) ?? 1 }}">
        @error("mainSort")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="mainStatus">Status</label>
            <select name="mainStatus" id="mainStatus" class="form-control select2 @error("mainStatus") is-invalid @enderror" data-placeholder="Select a Status" required>
                @foreach(config('status.hotel') as $key => $status)
                    <option value="{{ $key }}"
                            @if((isset($hotel->status) && $hotel->status == $key) || ($key == old('mainStatus')))
                            selected
                            @endif>{{ $status }}</option>
                @endforeach
            </select>
            @error("mainStatus")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label for="mainBookingDay">Day Before Booking</label>
        <input type="number" class="form-control @error("mainBookingDay") is-invalid @enderror" name="mainBookingDay" id="mainBookingDay"
               value="{{ (isset($hotel) && isset($hotel->order_day)) ? $hotel->order_day : old("mainBookingDay") }}">
        @error("mainBookingDay")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="mainCancelDay">Day Before Сancellation</label>
        <input type="number" class="form-control @error("mainCancelDay") is-invalid @enderror" name="mainCancelDay" id="mainCancelDay"
               value="{{ (isset($hotel) && isset($hotel->cancel_day)) ? $hotel->cancel_day : old("mainCancelDay") }}">
        @error("mainCancelDay")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mt-3">
    <div class="col-4">
        <label for="mainCheckin">Checkin Time</label>
        <input type="text" class="form-control @error("mainCheckin") is-invalid @enderror" name="mainCheckin" id="mainCheckin"
               value="{{ (isset($hotel) && isset($hotel->check_in)) ? $hotel->check_in : old("mainCheckin") }}">
        @error("mainCheckin")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="mainCheckout">Checkout Time</label>
        <input type="text" class="form-control @error("mainCheckout") is-invalid @enderror" name="mainCheckout" id="mainCheckout"
               value="{{ (isset($hotel) && isset($hotel->check_out)) ? $hotel->check_out : old("mainCheckout") }}">
        @error("mainCheckout")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="mainPriceFrom">Price From</label>
        <input type="text" class="form-control @error("mainPriceFrom") is-invalid @enderror" name="mainPriceFrom" id="mainPriceFrom"
               value="{{ (isset($hotel) && isset($hotel->price_from)) ? $hotel->price_from : old("mainPriceFrom") }}" required>
        @error("mainPriceFrom")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="mainPriceTo">Price To</label>
        <input type="text" class="form-control @error("mainPriceTo") is-invalid @enderror" name="mainPriceTo" id="mainPriceTo"
               value="{{ (isset($hotel) && isset($hotel->price_to)) ? $hotel->price_to : old("mainPriceTo") }}">
        @error("mainPriceTo")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>