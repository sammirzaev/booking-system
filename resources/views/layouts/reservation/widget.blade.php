<div id="colorlib-reservation">
    <!-- <div class="container"> -->
    <div class="row">
        <div class="search-wrap">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Hotels</a></li>
                    <li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> Cars </a></li>
                    <li><a data-toggle="tab" href="#tour"><i class="flaticon-around"></i> Tours</a></li>
                    <li><a data-toggle="tab" href="#activity"><i class="flaticon-island"></i> Activities</a></li>
                    <li><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Flights</a></li>
                    <li><a data-toggle="tab" href="#train"><i class="fa fa-train"></i> Trains</a></li>
                </ul>
            </div>
            <div class="tab-content">

                @include('layouts.reservation.widget-hotel')

                <div id="car" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Where:</label>
                                    <div class="form-field">
                                        <input type="text" id="location" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Start Date:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Return Date:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" id="submit" value="Find Car" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tour" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Where:</label>
                                    <div class="form-field">
                                        <input type="text" id="location" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Start Date:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="guests">Categories</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="category" id="category" class="form-control">
                                            <option value="#">Suite</option>
                                            <option value="#">Super Deluxe</option>
                                            <option value="#">Balcony</option>
                                            <option value="#">Economy</option>
                                            <option value="#">Luxury</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" id="submit" value="Find Tours" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="activity" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Where:</label>
                                    <div class="form-field">
                                        <input type="text" id="location" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Start Date:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="guests">Categories</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="category" id="category" class="form-control">
                                            <option value="#">Suite</option>
                                            <option value="#">Super Deluxe</option>
                                            <option value="#">Balcony</option>
                                            <option value="#">Economy</option>
                                            <option value="#">Luxury</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" id="submit" value="Find Activities" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="flight" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Where:</label>
                                    <div class="form-field">
                                        <input type="text" id="location" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="date">Check-in:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="date">Check-out:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="guests">Guest</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="people" class="form-control">
                                            <option value="#">1</option>
                                            <option value="#">2</option>
                                            <option value="#">3</option>
                                            <option value="#">4</option>
                                            <option value="#">5+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" id="submit" value="Find Flights" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <div id="train" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Where:</label>
                                    <div class="form-field">
                                        <input type="text" id="location" class="form-control" placeholder="Search Location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="date">Check-in:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="date">Check-out:</label>
                                    <div class="form-field">
                                        <i class="icon icon-calendar2"></i>
                                        <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="guests">Guest</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="people" class="form-control">
                                            <option value="#">1</option>
                                            <option value="#">2</option>
                                            <option value="#">3</option>
                                            <option value="#">4</option>
                                            <option value="#">5+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="submit" id="submit" value="Find Trains" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>