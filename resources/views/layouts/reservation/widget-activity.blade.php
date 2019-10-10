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
                        <input type="text" id="date" class="form-control date" placeholder="Check-in date" required autocomplete="off">
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