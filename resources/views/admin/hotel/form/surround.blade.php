@if(isset($hotelSurrounds) && $hotelSurrounds->isNotEmpty())
    @foreach($hotelSurrounds->sortBy('sort') as $hotelSurround)
        <div class="row">
            <div class="col-12">
                <i class="fa fa-{{ $hotelSurround->icon }}"></i><h4>{{ $hotelSurround->language->title }}</h4>
            </div>
            <div class="col-6">
                <label for="hotelSurroundsName{{ $hotelSurround->id }}">
                    Name
                </label>
                @php
                    if(isset($hotel->surrounds) && $surround = current(current($hotel->surrounds()->where('hotel_surround_id', $hotelSurround->id)->get() ))){
                        $hotelSurroundsName         = $surround->pivot->name;
                        $hotelSurroundsDistance     = $surround->pivot->distance;
                        $hotelSurroundsLatitude     = $surround->pivot->latitude;
                        $hotelSurroundsLongitude    = $surround->pivot->longitude;
                    }
                @endphp

                <input class="form-control" type="text" name="hotelSurroundsName[{{ $hotelSurround->id }}]"
                       placeholder="Enter Surround Name" id="hotelSurroundsName{{ $hotelSurround->id }}"
                       value="{{ isset($hotelSurroundsName) ? $hotelSurroundsName : old("hotelSurroundsName.$hotelSurround->id") }}">
            </div>
            <div class="col-6">
                <label for="hotelSurroundsDistance{{ $hotelSurround->id }}">
                    Distance
                </label>
                <input class="form-control" type="text" name="hotelSurroundsDistance[{{ $hotelSurround->id }}]"
                       placeholder="Enter Surround Distance" id="hotelSurroundsDistance{{ $hotelSurround->id }}"
                       value="{{ isset($hotelSurroundsDistance) ? $hotelSurroundsDistance : old("hotelSurroundsDistance.$hotelSurround->id") }}">
            </div>
            <div class="col-6">
                <label for="hotelSurroundsLatitude{{ $hotelSurround->id }}">Latitude</label>
                <input type="text" name="hotelSurroundsLatitude[{{ $hotelSurround->id }}]" id="hotelSurroundsLatitude{{ $hotelSurround->id }}"
                       class="form-control @error("hotelSurroundsLatitude.$hotelSurround->id") is-invalid @enderror"
                       placeholder="Enter Surround latitude"
                       value="{{ isset($hotelSurroundsLatitude) ? $hotelSurroundsLatitude : old("hotelSurroundsLatitude.$hotelSurround->id") }}">

            </div>
            <div class="col-6">
                <label for="hotelSurroundsLongitude{{ $hotelSurround->id }}">Longitude</label>
                <input type="text" name="hotelSurroundsLongitude[{{ $hotelSurround->id }}]" id="hotelSurroundsLongitude{{ $hotelSurround->id }}"
                       class="form-control @error("hotelSurroundsLongitude.$hotelSurround->id") is-invalid @enderror"
                       placeholder="Enter Surround longitude"
                       value="{{ isset($hotelSurroundsLongitude) ? $hotelSurroundsLongitude : old("hotelSurroundsLongitude.$hotelSurround->id") }}">
            </div>
        </div>
        <hr>
    @endforeach
@endif