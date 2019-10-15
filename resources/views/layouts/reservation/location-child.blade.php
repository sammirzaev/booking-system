@foreach($items as $item)
    <option class="fa fa-map-marker option-grey" value="{{ $item->id }}">{{ $parent . $item->language->title }}</option>
    @if($locations->where('parent_id', $item->id)->isNotEmpty())
        @include('layouts.reservation.location-child', [
           'items' => $locations->where('parent_id', $item->id)->sortBy('sort'),
           'parent' => $item->parent_id ? $parent . ' ' : ' '
       ])
    @endif
@endforeach