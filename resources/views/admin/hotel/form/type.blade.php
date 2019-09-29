<div class="row mt-4">
    @if(isset($hotelTypes) && $hotelTypes->isNotEmpty())
        @foreach($hotelTypes as $hotelType)
            <div class="col-sm-3">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="hotelTypes[{{ $hotelType->id }}]" id="hotelTypes{{ $hotelType->id }}"
                        @if(old("hotelTypes.$hotelType->id"))
                            checked
                        @endif
                        @if(isset($hotel->types) && $hotel->types->where('id', $hotelType->id)->isNotEmpty())
                           checked
                        @endif
                        >
                        <label for="hotelTypes{{ $hotelType->id }}">
                            {{ $hotelType->language->title }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>