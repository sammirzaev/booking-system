<div id="wrapper">
    <div class="cover"></div>
    <div class="modal">
        <div class="content">
            <form action="{{ route('hotel.index') }}" method="get" class="colorlib-form">
                <div class="row">
                    <div class="col-md-2">
                        <div class="booknow">
                            <h2>Book Now</h2>
                            <span>Best Price Online</span>
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="adult">Adult:</label>
                            <div class="form-field">
                                <i class="icon icon-man"></i>
                                <input type="number" name="adult" id="adult" class="form-control" placeholder="Enter adult">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="child">Children:</label>
                            <div class="form-field">
                                <i class="icon icon-flow-children"></i>
                                <input type="number" name="child" id="child" class="form-control" placeholder="Enter children">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="submit" id="submit" value="Check Available" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>