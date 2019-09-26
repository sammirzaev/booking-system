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
                <input class="form-control" type="text" name="hotelSurroundsName[{{ $hotelSurround->id }}]"
                       placeholder="Enter Surround Name" id="hotelSurroundsName{{ $hotelSurround->id }}">
            </div>
            <div class="col-6">
                <label for="hotelSurroundsDistance{{ $hotelSurround->id }}">
                    Distance
                </label>
                <input class="form-control" type="text" name="hotelSurroundsDistance[{{ $hotelSurround->id }}]"
                       placeholder="Enter Surround Distance" id="hotelSurroundsDistance{{ $hotelSurround->id }}">
            </div>
            <div class="col-6">
                <label for="hotelSurroundsLatitude">Latitude</label>
                <input type="text" name="hotelSurroundsLatitude" id="hotelSurroundsLatitude"
                       class="form-control @error('latitude') is-invalid @enderror"
                       placeholder="Enter Surround latitude" value="">

            </div>
            <div class="col-6">
                <label for="hotelSurroundsLongitude">Longitude</label>
                <input type="text" name="hotelSurroundsLongitude" id="hotelSurroundsLongitude"
                       class="form-control @error('longitude') is-invalid @enderror"
                       placeholder="Enter Surround longitude" value="">
            </div>

        </div>
        <hr>
    @endforeach
@endif