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
                        <input type="text" id="date" class="form-control date" placeholder="Check-in date" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="date">Return Date:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input type="text" id="date" class="form-control date" placeholder="Check-out date" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" name="submit" id="submit" value="Find Car" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>