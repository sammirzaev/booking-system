@foreach($items as $item)
    <option value="{{ $item->id }}"
            @if((isset($location->parent_id) && $location->parent_id == $item->id) || ($item->id == old('parent')))
            selected
            @endif
            @if(isset($location->id) && ($location->id === $item->id))
            disabled
            @endif
    >{{ $parent . $item->language->title }}</option>
    @if($locations->where('parent_id', $item->id)->isNotEmpty())
        @include('admin.location.child', [
           'items' => $locations->where('parent_id', $item->id)->sortBy('sort'),
           'parent' => $item->parent_id ? $parent . $item->language->title . ' > ' : $item->language->title . ' > '
       ])
    @endif
@endforeach