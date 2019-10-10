<div id="train" class="tab-pane fade">
    <form method="post" class="colorlib-form">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="form_location">From:</label>
                    <div class="form-field">
                        <input type="text" id="form_location" class="form-control" placeholder="From Location" required>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="to_location">To:</label>
                    <div class="form-field">
                        <input type="text" id="to_location" class="form-control" placeholder="To Location" required>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="date">Check-in:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" id="date" class="form-control date" placeholder="Check-in date" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="date">Check-out:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" id="date" class="form-control date" placeholder="Check-out date" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="guests">Guest</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="people" id="people" class="form-control" required>
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