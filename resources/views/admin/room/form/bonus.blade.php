<div class="row mt-4">
    @if(isset($roomBonuses) && $roomBonuses->isNotEmpty())
        @foreach($roomBonuses as $roomBonus)
            <div class="col-sm-3">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" name="roomBonuses[{{ $roomBonus->id }}]" id="roomBonuses{{ $roomBonus->id }}"
                               @if(old("roomBonuses.$roomBonus->id"))
                               checked
                               @endif
                               @if(isset($room->bonuses) && $room->bonuses->where('id', $roomBonus->id)->isNotEmpty())
                               checked
                               @endif
                        >
                        <label for="roomBonuses{{ $roomBonus->id }}">
                            {{ $roomBonus->language->title }}
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>