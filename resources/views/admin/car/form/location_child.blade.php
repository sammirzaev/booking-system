@foreach($items as $item)
    <option value="{{ $item->id }}"
        @if((isset($car->location_id) && $car->location_id == $item->id) || ($item->id == old('location')))
            selected
        @endif
    >{{ $parent . $item->language->title }}</option>
    @if($locations->where('parent_id', $item->id)->isNotEmpty())
        @include('admin.car.form.location_child', [
           'items' => $locations->where('parent_id', $item->id)->sortBy('sort'),
           'parent' => $item->parent_id ? $parent . $item->language->title . ' > ' : $item->language->title . ' > '
       ])
    @endif
@endforeach
