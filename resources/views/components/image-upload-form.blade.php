<form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="m-5">
        <h1 class=" mb-5 display-3">{{ $label }}</h1>
        <x-image-size-warning></x-image-size-warning>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="m-5">
        <button class="btn btn-primary">Upload Afbeelding</button>
    </div>
</form>
