<div id="wrapper">
    <div class="cover"></div>
    <div class="modal">
        <div class="content">
            <form action="{{ route('room.search.index') }}" method="post" class="colorlib-form" id="room_search">
                <input type="hidden" name="room_id" id="room_id">
                <div class="row">
                    <div class="col-md-2">
                        <div class="booknow">
                            <h2>Book Now</h2>
                            <span>Best Price Online</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="roo_date_in">Check-in:</label>
                            <div class="form-field">
                                <i class="icon icon-calendar2"></i>
                                <input type="text" name="date_in" id="roo_date_in" class="form-control date" placeholder="Check-in date" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="roo_date_out">Check-out:</label>
                            <div class="form-field">
                                <i class="icon icon-calendar2"></i>
                                <input type="text" name="date_out" id="roo_date_out" class="form-control date" placeholder="Check-out date" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="roo_adult">Adult:</label>
                            <div class="form-field">
                                <i class="icon icon-man"></i>
                                <input type="number" name="adult" id="roo_adult" class="form-control" placeholder="Enter adult" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="roo_children">Children:</label>
                            <div class="form-field">
                                <i class="icon icon-flow-children"></i>
                                <input type="number" name="children" id="roo_children" class="form-control" placeholder="Enter children">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" form="room_search" name="submit" id="submit" value="Check Available" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
            <div class="hide row" id="modal-status">
                <div class="col-sm-5"></div>
                <div class="col-lg-2">
                    <a class="btn btn-primary btn-block" id="model-checkout" href="#">
                        <span class="black">
                            Checkout
                        </span>
                    </a>
                </div>
            </div>
            <div class="hide" id="modal-error">
            </div>
        </div>
    </div>
</div>