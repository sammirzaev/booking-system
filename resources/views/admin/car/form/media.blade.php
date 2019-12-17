<div class="row mt-4">
    <div class="form-group">
        <label class="required" for="media">Media files</label>
        <input id="media" type="file" name="media[]" multiple="" class="form-control @error("media") is-invalid @enderror">
    </div>
    @error("media")
    <p class="text-danger">{{ $message }}</p>
    @enderror

    @if(isset($car->img))
        @foreach($car->img as $image)
            <div class="form-group">
                <div class="col-sm-2">
                    <a href="{{ asset("storage/cars/$image") }}" data-toggle="lightbox" data-title="{{ $image }}" data-gallery="gallery">
                        <img src="{{ asset("storage/cars/$image") }}" class="img-fluid mb-2" alt="{{ $image }}"/>
                    </a>
                </div>
            </div>
        @endforeach
    @endif
</div>
