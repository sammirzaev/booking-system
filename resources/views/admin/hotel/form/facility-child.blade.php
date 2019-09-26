<div class="col-sm-12">
    <div class="form-group clearfix">
        @foreach($items as $item)
            <div class="icheck-primary d-inline">
                <input type="checkbox" name="hotelFacilities[{{ $item->id }}]" id="hotelFacilities{{ $item->id }}">
                <label class="mr-3 mb-3" for="hotelFacilities{{ $item->id }}">
                    {{ $item->language->title }}
                </label>
            </div>
            @if($hotelFacilities->where('parent_id', $item->id)->isNotEmpty())
                @include('admin.hotel.form.facility-child', [
                   'items' => $hotelFacilities->where('parent_id', $item->id)->sortBy('sort')
               ])
            @endif
        @endforeach
        <hr>
    </div>
</div>
