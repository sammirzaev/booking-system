<div class="row mt-4">
    <input type="file" name="mediaUploaded[]" multiple="" class="@error("mediaUploaded") is-invalid @enderror">

    @error("mediaUploaded")
    <p class="text-danger">{{ $message }}</p>
    @enderror

    @if(isset($room->images) && $room->images->isNotEmpty())
        @foreach($room->images as $image)
            <div class="col-sm-2">
                <a href="{{ asset("storage/rooms/$image->name") }}" data-toggle="lightbox" data-title="{{ $image->name }} - {{ $image->type }}" data-gallery="gallery">
                    <img src="{{ asset("storage/rooms/$image->name") }}" class="img-fluid mb-2" alt="{{ $image->name }} {{ $image->type }}"/>
                </a>
                <a href="#">Delete</a>
            </div>
        @endforeach
    @endif

{{--    <media-upload></media-upload>--}}
</div>