@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <x-image-upload-form action="{{ route('slider.store') }}" label="Upload Afbeelding Voor Carousel Slide" />
            </div>
        </div>
    </div>
@endsection
