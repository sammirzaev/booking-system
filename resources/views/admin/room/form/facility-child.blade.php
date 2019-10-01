<div class="col-sm-12">
    <div class="form-group clearfix">
        @foreach($items as $item)
            <div class="icheck-primary d-inline">
                <input type="checkbox" name="roomFacilities[{{ $item->id }}]" id="roomFacilities{{ $item->id }}"
                       @if(old("roomFacilities.$item->id"))
                       checked
                       @endif
                       @if(isset($room->facilities) && $room->facilities->where('id', $item->id)->isNotEmpty())
                       checked
                       @endif
                >
                <label class="mr-3 mb-3" for="roomFacilities{{ $item->id }}">
                    {{ $item->language->title }}
                </label>
            </div>
            @if($roomFacilities->where('parent_id', $item->id)->isNotEmpty())
                @include('admin.room.form.facility-child', [
                   'items' => $roomFacilities->where('parent_id', $item->id)->sortBy('sort')
               ])
            @endif
        @endforeach
        <hr>
    </div>
</div>
