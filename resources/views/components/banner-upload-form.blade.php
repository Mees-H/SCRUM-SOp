@props(['action', 'pageId'])

<form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <div class="m-5 d-flex flex-column">
        <h3 class="float-start mb-5">Banner</h3>
        <x-image-size-warning></x-image-size-warning>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="m-5">
        <button dusk="upload" class="btn btn-primary">Upload Banner</button>
    </div>
</form>
