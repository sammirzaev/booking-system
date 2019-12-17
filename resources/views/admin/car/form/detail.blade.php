<div class="row mt-3">
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="detailCurrentDate">Date Start</label>
            <div class="input-group">
                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                </div>
                <input type="text" class="form-control float-right" id="detailCurrentDate" name="detailCurrentDate"
                       placeholder="{{ (isset($car) && $car->availabilities->first() && $car->availabilities->last()) ?
                       date('Y-m-d', $car->availabilities->first()->date) . " - " .date('Y-m-d', $car->availabilities->last()->date) :
                       old('detailCurrentDate') }}" autocomplete="off">

                <input type="hidden" name="detailCurrentDateStart"  value="{{ (isset($car) && $car->availabilities->first()) ?
                       date('Y-m-d', $car->availabilities->first()->date) :
                       old('detailCurrentDateStart') }}">
                <input type="hidden" name="detailCurrentDateEnd" value="{{ (isset($car) && $car->availabilities->last()) ?
                       date('Y-m-d', $car->availabilities->last()->date) :
                       old('detailCurrentDateEnd') }}">

                @error("detailCurrentDate")
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error("detailCurrentDateStart")
                <p class="text-danger">{{ $message }}</p>
                @enderror
                @error("detailCurrentDateEnd")
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
