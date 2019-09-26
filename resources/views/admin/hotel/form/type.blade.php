<div class="row mt-4">
    @if(isset($hotelTypes) && $hotelTypes->isNotEmpty())
        @foreach($hotelTypes as $hotelType)
            <div class="col-sm-3">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="hotelTypes[{{ $hotelType->id }}]" id="hotelTypes{{ $hotelType->id }}">
                        <label for="hotelTypes{{ $hotelType->id }}">
                            {{ $hotelType->language->title }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>