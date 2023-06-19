@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                <div class="d-flex justify-content-center">
                    @if(session()->has('errors'))
                        <div class="alert alert-danger col-md-6 text-center" role="alert">
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
                <x-image-upload-form action="{{ route('slider.store') }}" label="'Upload afbeelding voor slider'" />
            </div>
        </div>
    </div>

@endsection
