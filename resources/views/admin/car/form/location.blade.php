<div class="row mt-4">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="required" for="location">Object Location</label>
            <select name="location" id="location" class="form-control select2 @error("location") is-invalid @enderror" data-placeholder="Select a location" required>
                @if(isset($locations) && $locations->isNotEmpty())
                    @include('admin.car.form.location_child', ['items' => $locations->where('parent_id', null)->sortBy('sort'), 'parent' => ''])
                @endif
            </select>
            @error('location')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <label for="locationLatitude">Object Latitude</label>
        <input type="text" name="locationLatitude" id="locationLatitude" class="form-control @error('locationLatitude') is-invalid @enderror"
               placeholder="Enter latitude" value="{{ isset($location->latitude) ? $location->latitude : old('locationLatitude') }}">
        @error('locationLatitude')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="locationLongitude">Object Longitude</label>
        <input type="text" name="locationLongitude" id="locationLongitude" class="form-control @error('locationLongitude') is-invalid @enderror"
               placeholder="Enter longitude" value="{{ isset($location->longitude) ? $location->longitude : old('locationLongitude') }}">
        @error('locationLongitude')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
