<div class="side search-wrap animate-box">
    <h3 class="sidebar-heading">Find your hotel</h3>
    <form action="{{ route('hotel.index') }}" method="post" class="colorlib-form">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="where">Where:</label>
                    <div class="form-field">
                        <i class="icon icon-map-marker"></i>
                        <select class="form-control" name="where" id="where">
                            <option value="" class="option-grey">Everywhere</option>
                            @if(isset($locations) && $locations->isNotEmpty())
                                @include('layouts.reservation.location-child', ['items' => $locations->where('parent_id', null)->sortBy('sort'), 'parent' => ''])
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="date_in">Check-in:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_in" id="date_in" class="form-control date" placeholder="Check-in date">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="date_out">Check-out:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" name="date_out" id="date_out" class="form-control date" placeholder="Check-out date">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="people">Guest</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="people" id="people" class="form-control">
                            <option value="#" class="option-grey">1</option>
                            <option value="#" class="option-grey">2</option>
                            <option value="#" class="option-grey">3</option>
                            <option value="#" class="option-grey">4</option>
                            <option value="#" class="option-grey">5+</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="submit" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>