<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="title">Title</label>
        <input type="text" class="form-control @error("title") is-invalid @enderror" name="title" id="title"
               value="{{ (isset($car) && isset($car->title)) ? $car->title : old("title") }}">
        @error("title")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label class="required" for="type">Type</label>
        <select name="type" id="type" class="form-control select2 @error("type") is-invalid @enderror" data-placeholder="Select a type" required>
            @foreach(config('settings.car_types') as $key => $type)
                <option value="{{ $key }}"
                        @if((isset($car->type) && $car->type == $key) || ($key == old('type')))
                        selected
                    @endif>{{ $type['title'] }}</option>
            @endforeach
        </select>
        @error("type")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label class="required" for="sort">Sort</label>
        <input type="number" class="form-control @error("sort") is-invalid @enderror" name="sort" min="1" id="sort"
               value="{{ ((isset($car) && isset($car->sort)) ? $car->star : old("sort")) ?? 1 }}">
        @error("sort")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="status">Status</label>
            <select name="status" id="status" class="form-control select2 @error("status") is-invalid @enderror" data-placeholder="Select a status" required>
                @foreach(config('status.car') as $key => $status)
                    <option value="{{ $key }}"
                            @if((isset($car->status) && $car->status == $key) || ($key == old('status')))
                            selected
                            @endif>{{ $status }}</option>
                @endforeach
            </select>
            @error("status")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <label class="required" for="bags">Large bags</label>
        <input type="number" class="form-control @error("bags") is-invalid @enderror" name="bags" id="bags" min="1"
               value="{{ (isset($car) && isset($car->bags)) ? $car->bags : old("bags") }}">
        @error("bags")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label for="doors">Doors</label>
        <input type="number" class="form-control @error("doors") is-invalid @enderror" name="doors" id="doors" min="1"
               value="{{ (isset($car) && isset($car->doors)) ? $car->doors : old("doors") }}">
        @error("doors")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="condition">Condition</label>
            <select name="condition" id="condition" class="form-control select2 @error("condition") is-invalid @enderror" data-placeholder="Select a condition" required>
                <option value="0"
                    @if((isset($car->condition) && $car->condition == 0) || (0 == old('condition')))
                        selected
                    @endif>Not available</option>
                <option value="1"
                    @if((isset($car->condition) && $car->condition == 1) || (1 == old('condition')))
                        selected
                    @endif>Available</option>
            </select>
            @error("condition")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="driver_experience">Driver Experience</label>
            <input type="number" class="form-control @error("driver_experience") is-invalid @enderror" name="driver_experience" id="driver_experience" min="1"
                   value="{{ (isset($car) && isset($car->driver_experience)) ? $car->driver_experience : old("driver_experience") }}">
            @error("driver_experience")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="adult_min">Minimum adults</label>
        <input type="number" class="form-control @error("adult_min") is-invalid @enderror" name="adult_min" id="adult_min" min="1"
               value="{{ (isset($car) && isset($car->adult_min)) ? $car->adult_min : old("adult_min") }}">
        @error("adult_min")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-4">
        <label class="required" for="adult_max">Maximum adults</label>
        <input type="number" class="form-control @error("adult_max") is-invalid @enderror" name="adult_max" id="adult_max" min="1"
               value="{{ (isset($car) && isset($car->adult_max)) ? $car->adult_max : old("adult_max") }}">
        @error("adult_max")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mt-3">
    <div class="col-4">
        <label class="required" for="price">Price</label>
        <input type="text" class="form-control @error("price") is-invalid @enderror" name="price" id="price"
               value="{{ (isset($car) && isset($car->price)) ? $car->price : old("price") }}" required>
        @error("price")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
