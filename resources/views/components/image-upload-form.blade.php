<form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="m-5">
        <h1 class=" mb-5 display-3">{{ $label }}</h1>
        <div class="w-100 alert alert-warning col-md-6 text-center"><p>de afbeelding mag niet groter dan 2 MB zijn.</p></div>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="m-5">
        <button class="btn btn-primary">Upload Afbeelding</button>
    </div>
</form>
