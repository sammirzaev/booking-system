@foreach($items as $item)
    <option value="{{ $item->id }}"
            @if((isset($roomFacility->parent_id) && $roomFacility->parent_id == $item->id) || ($item->id == old('parent')))
            selected
            @endif
            @if(isset($roomFacility->id) && ($roomFacility->id === $item->id))
            disabled
            @endif
    >{{ $parent . $item->language->title }}</option>
    @if($roomFacilities->where('parent_id', $item->id)->isNotEmpty())
        @include('admin.roomfacility.child', [
           'items' => $roomFacilities->where('parent_id', $item->id)->sortBy('sort'),
           'parent' => $item->parent_id ? $parent . $item->language->title . ' > ' : $item->language->title . ' > '
       ])
    @endif
@endforeach

