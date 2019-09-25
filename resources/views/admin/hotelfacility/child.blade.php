@foreach($items as $item)
    <option value="{{ $item->id }}"
            @if((isset($hotelFacility->parent_id) && $hotelFacility->parent_id == $item->id) || ($item->id == old('parent')))
            selected
            @endif
            @if(isset($hotelFacility->id) && ($hotelFacility->id === $item->id))
            disabled
            @endif
    >{{ $parent . $item->language->title }}</option>
    @if($hotelFacilities->where('parent_id', $item->id)->isNotEmpty())
        @include('admin.hotelfacility.child', [
           'items' => $hotelFacilities->where('parent_id', $item->id)->sortBy('sort'),
           'parent' => $item->parent_id ? $parent . $item->language->title . ' > ' : $item->language->title . ' > '
       ])
    @endif
@endforeach

