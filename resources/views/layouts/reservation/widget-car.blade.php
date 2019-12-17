<div id="car" class="tab-pane fade">
    <form action="{{ route('car.search') }}" method="get" class="colorlib-form">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="where"> {{ __('layouts/reservation/widget.where_label') }}:</label>
                    <div class="form-field">
                        <select class="form-control" name="where" id="where">
                            <option value="" class="option-grey">{{ __('layouts/reservation/widget.where_default') }}</option>
                            @if(isset($locations) && $locations->isNotEmpty())
                                @include('layouts.reservation.location-child', ['items' => $locations->where('parent_id', null)->sortBy('sort'), 'parent' => ''])
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="start_date">{{ __('layouts/reservation/widget.start_date') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="start_date" id="start_date" class="form-control date" placeholder="{{ __('layouts/reservation/widget.start_date') }}" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="start_time">{{ __('layouts/reservation/widget.start_time') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-time"></i>
                        <select name="start_time" id="start_time" class="form-control">
                            @for($i = 0; $i <= 23; $i++)
                                <option value="{{sprintf("%02d", $i)}}:00" class="option-grey">{{sprintf("%02d", $i)}} : 00</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="end_date">{{ __('layouts/reservation/widget.end_date') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="end_date" id="end_date" class="form-control date" placeholder="{{ __('layouts/reservation/widget.end_date') }}" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_time">{{ __('layouts/reservation/widget.end_time') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-time"></i>
                        <select name="end_time" id="end_time" class="form-control">
                            @for($i = 0; $i <= 23; $i++)
                                <option value="{{sprintf("%02d", $i)}}:00" class="option-grey">{{sprintf("%02d", $i)}} : 00</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="adults">{{ __('layouts/reservation/widget.adults') }}</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="adults" id="adults" class="form-control">
                            <option value="1" class="option-grey">1</option>
                            <option value="2" class="option-grey">2</option>
                            <option value="3" class="option-grey">3</option>
                            <option value="4" class="option-grey">4</option>
                            <option value="5" class="option-grey">5+</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="driver">{{ __('layouts/reservation/widget.driver') }}</label>
                    <div class="form-field">
                        <i class="icon icon-drive"></i>
                        <select name="driver" id="driver" class="form-control">
                            <option value="1" class="option-grey">{{ __('layouts/reservation/widget.driver_default') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" name="submit" id="submit" value="{{ __('layouts/reservation/widget.car_submit') }}" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>
