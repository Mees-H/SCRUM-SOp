@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center image-form">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block mt-5">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <form class="col-md-6 image-uplode d-inline-block border shadow-lg rounded p-2 mt-5" action="{{ route('privacy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-5">
                        <h3 class="float-start mb-5">Upload privacyverklaring</h3>
                        <input type="file" class="form-control form-control-lg" name="file" id="file">
                    </div>
                    <div class="m-5">
                        <button class="btn btn-primary">Upload privacyverklaring</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
