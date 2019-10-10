<div id="hotel" class="tab-pane fade in active">
    <form action="{{ route('hotel.index') }}" method="get" class="colorlib-form">
        <div class="row">
            <div class="col-md-2">
                <div class="booknow">
                    <h2>{{ __('layouts/reservation/widget.book_now_h2') }}</h2>
                    <span>{{ __('layouts/reservation/widget.book_now_desc') }}</span>
                </div>
            </div>
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
                    <label for="date_in">{{ __('layouts/reservation/widget.check_in_label') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_in" id="date_in" class="form-control date" placeholder="{{ __('layouts/reservation/widget.check_in_placeholder') }}" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="date_out">{{ __('layouts/reservation/widget.check_out_label') }}:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_out" id="date_out" class="form-control date" placeholder="{{ __('layouts/reservation/widget.check_out_placeholder') }}" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="people">{{ __('layouts/reservation/widget.guest_label') }}</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="people" id="people" class="form-control" required>
                            <option value="1" class="option-grey">1</option>
                            <option value="2" class="option-grey">2</option>
                            <option value="3" class="option-grey">3</option>
                            <option value="4" class="option-grey">4</option>
                            <option value="5" class="option-grey">5+</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" name="submit" id="submit" value="{{ __('layouts/reservation/widget.hotel_submit') }}" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>