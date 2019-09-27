<div class="row mt-4">
    @if(isset($hotelBonuses) && $hotelBonuses->isNotEmpty())
        @foreach($hotelBonuses as $hotelBonus)
            <div class="col-sm-3">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="hotelBonuses[{{ $hotelBonus->id }}]" id="hotelBonuses{{ $hotelBonus->id }}">
                        <label for="hotelBonuses{{ $hotelBonus->id }}">
                            {{ $hotelBonus->language->title }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>