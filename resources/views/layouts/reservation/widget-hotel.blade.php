<div id="hotel" class="tab-pane fade in active">
    <form action="{{ route('hotel.search') }}" method="get" class="colorlib-form">
        <div class="row">
            <div class="col-md-2">
                <div class="booknow">
                    <h2>Book Now</h2>
                    <span>Best Price Online</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="where"> Where:</label>
                    <div class="form-field">
                        <select class="form-control" name="where" id="where">
                            <option value="" class="option-grey">Everywhere</option>
                            @if(isset($locations) && $locations->isNotEmpty())
                                @include('layouts.reservation.location-child', ['items' => $locations->where('parent_id', null), 'parent' => ''])
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="date_in">Check-in:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_in" id="date_in" class="form-control date" placeholder="Check-in date">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="date_out">Check-out:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_out" id="date_out" class="form-control date" placeholder="Check-out date">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="people">Guest</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="people" id="people" class="form-control">
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
                <input type="submit" name="submit" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>