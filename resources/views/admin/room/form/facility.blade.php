<div class="row mt-4">
    @if(isset($roomFacilities) && $roomFacilities->isNotEmpty())
        @include('admin.room.form.facility-child', ['items' => $roomFacilities->where('parent_id', null)->sortBy('sort')])
    @endif

    @error('facilities')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>