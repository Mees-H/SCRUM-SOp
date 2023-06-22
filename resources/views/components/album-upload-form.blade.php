@props(['action', 'label', 'albumId'])

<form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="album_id" value="{{ $albumId }}">
    <div class="m-5">
        <h3 class="float-start mb-5">{{ $label }}</h3>
        <input type="file" class="form-control p-1 @error('images[]') is-invalid @enderror" name="images[]" id="image" multiple required autofocus>
    </div>
    <div class="m-5">
        <button class="btn btn-primary">Upload Afbeeldingen</button>
    </div>
</form>
