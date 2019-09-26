@foreach(config('settings.locales') as $locale)
    <div class="row mt-4">
        <div class="col-6">
            <label class="required" for="mainTitle[{{ $locale }}]">
                Name {{ strtoupper($locale) }}
            </label>
            <input class="form-control" type="text" name="mainTitle[{{ $locale }}]"
                   placeholder="Enter Hotel Name" id="mainTitle[{{ $locale }}]">
        </div>
        <div class="col-6">
            <label class="required" for="mainAddress[{{ $locale }}]">
                Address {{ strtoupper($locale) }}
            </label>
            <input class="form-control" type="text" name="mainAddress[{{ $locale }}]"
                   placeholder="Enter Hotel Address" id="mainAddress[{{ $locale }}]">
        </div>
        <div class="col-12 mt-3">
            <label class="required" for="mainDescription[{{ $locale }}]">
                Description {{ strtoupper($locale) }}
            </label>
            <textarea class="form-control" name="mainDescription[{{ $locale }}]" rows="5"
                      id="mainDescription[{{ $locale }}]">Enter Hotel Description {{ strtoupper($locale) }}
            </textarea>
        </div>
    </div>
    <hr>
@endforeach

<div class="row mt-3">
    <div class="col-4">
        <label for="mainStar">Star</label>
        <input type="number" class="form-control" name="mainStar" min="1" max="5" id="mainStar">
    </div>
    <div class="col-4">
        <label for="mainSort">Sort</label>
        <input type="number" class="form-control" name="mainSort" min="1" id="mainSort">
    </div>
    <div class="col-4">
        <label class="required" for="mainStatus">Status</label>
        <select name="mainStatus" id="mainStatus" class="select2" data-placeholder="Select a Status">
            @foreach(config('status.hotel') as $key => $status)
                <option value="{{ $key }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label for="mainBookingDay">Day Before Booking</label>
        <input type="number" class="form-control" name="mainBookingDay" id="mainBookingDay">
    </div>
    <div class="col-4">
        <label for="mainCancelDay">Day Before Сancellation</label>
        <input type="number" class="form-control" name="mainCancelDay" id="mainCancelDay">
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label for="mainCheckin">Checkin Time</label>
        <input type="text" class="form-control" name="mainCheckin" id="mainCheckin">
    </div>
    <div class="col-4">
        <label for="mainCheckout">Checkout Time</label>
        <input type="text" class="form-control" name="mainCheckout" id="mainCheckout">
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="mainPriceFrom">Price From</label>
        <input type="text" class="form-control" name="mainPriceFrom" id="mainPriceFrom">
    </div>
    <div class="col-4">
        <label for="mainPriceTo">Price To</label>
        <input type="text" class="form-control" name="mainPriceTo" id="mainPriceTo">
    </div>
</div>