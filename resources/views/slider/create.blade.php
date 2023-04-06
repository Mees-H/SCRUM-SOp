@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-5">
                        <h3 class="float-start mb-5">Upload Afbeelding Voor Carousel Slide</h3>
                        <input type="file" class="form-control form-control-lg" name="image" id="image">
                    </div>
                    <div class="m-5">
                        <button class="btn btn-primary">Upload Afbeelding</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection