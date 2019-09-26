<div class="row mt-4">
    @if(isset($hotelFacilities) && $hotelFacilities->isNotEmpty())
        @include('admin.hotel.form.facility-child', ['items' => $hotelFacilities->where('parent_id', null)->sortBy('sort')])
    @endif

    @error('facilities')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>