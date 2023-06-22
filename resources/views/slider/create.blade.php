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
                        <h1 class="float-start mb-5 display-3">Upload afbeelding voor slider</h1>
                        <input type="file" class="form-control form-control-lg @error('file') is-invalid @enderror" name="image" id="image" autofocus>
                    </div>
                    <div class="m-5">
                        <button class="btn btn-primary">Upload Afbeelding</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
