<form action="{{ route('car.search') }}" method="get" class="colorlib-form-2">
    <div class="side animate-box">
        <div class="row">
            <div class="col-md-12">
                <h3 class="sidebar-heading">{{ __('car/index.price_range') }}</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price_from">{{ __('car/index.price_from') }}:</label>
                            <div class="form-field">
                                <i class="icon icon-arrow-down3"></i>
                                <select name="price_from" id="price_from" class="form-control">
                                    @for($i = 1; $i <= 1000; $i = $i . 0)
                                        <option value="{{ $i }}"
                                            @if(request()->has('price_from') && request()->input('price_from') === $i)
                                                selected
                                            @endif
                                        >{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price_to">{{ __('car/index.price_to') }}:</label>
                            <div class="form-field">
                                <i class="icon icon-arrow-down3"></i>
                                <select name="price_to" id="price_to" class="form-control"
                                        onchange="this.form.submit()"
                                />
                                @for($i = 10; $i <= 10000; $i = $i . 0)
                                    <option value="{{ $i }}"
                                        @if(request()->has('price_to') && request()->input('price_to') === $i)
                                            selected
                                        @endif
                                    >{{ $i }}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side animate-box">
        <div class="row">
            <div class="col-md-12">
                <h3 class="sidebar-heading">{{ __('car/index.car_type_title') }}</h3>
                @foreach(config('settings.car_types') as $type)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $type['title'] }}" name="type_{{ $type['title'] }}" value="1"
                           onclick="this.form.submit()"
                           @if(request()->has('type_' . $type['title']))
                                checked
                           @endif
                        />
                        <label class="form-check-label" for="{{ $type['title'] }}">
                            <h4 class="place">{{ __('config/settings.car_type_' . $type['code']) }}</h4>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</form>
