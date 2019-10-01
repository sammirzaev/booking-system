<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="detailAdults">Adults</label>
        <input type="number" class="form-control @error("detailAdults") is-invalid @enderror" name="detailAdults" id="detailAdults"
               value="{{ ((isset($room) && isset($room->detail->adults)) ? $room->detail->adults : old("detailAdults")) ?? 1 }}" required>
        @error("detailAdults")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="detailChildren">Children</label>
        <input type="number" class="form-control @error("detailChildren") is-invalid @enderror" name="detailChildren" id="detailChildren"
               value="{{ (isset($room) && isset($room->detail->children)) ? $room->detail->children : old("detailChildren") }}">
        @error("detailChildren")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="detailBeds">Beds</label>
        <input type="number" class="form-control @error("detailBeds") is-invalid @enderror" name="detailBeds" id="detailBeds"
               value="{{ (isset($room) && isset($room->detail->beds)) ? $room->detail->beds : old("detailBeds") }}">
        @error("detailBeds")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="detailFootage">Footage</label>
        <input type="number" class="form-control @error("detailFootage") is-invalid @enderror" name="detailFootage" id="detailFootage"
               value="{{ (isset($room) && isset($room->detail->footage)) ? $room->detail->footage : old("detailFootage") }}">
        @error("detailFootage")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

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
                       placeholder="{{ (isset($room) && $room->availabilities->first() && $room->availabilities->last()) ?
                       $room->availabilities->first()->current_date . " - " .$room->availabilities->last()->current_date :
                       old('detailCurrentDate') }}">

                <input type="hidden" name="detailCurrentDateStart"  value="{{ (isset($room) && $room->availabilities->first()) ?
                       $room->availabilities->first()->current_date :
                       old('detailCurrentDateStart') }}">
                <input type="hidden" name="detailCurrentDateEnd" value="{{ (isset($room) && $room->availabilities->last()) ?
                       $room->availabilities->last()->current_date :
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
