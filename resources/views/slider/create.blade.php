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
                <form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5"
                      action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-5">
                        <h1 class=" mb-5 display-3">Upload afbeelding voor slider</h1>
                        <div class="w-100 alert alert-warning col-md-6 text-center"><p>de afbeelding mag niet groter dan 2 GB zijn.</p></div>
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
