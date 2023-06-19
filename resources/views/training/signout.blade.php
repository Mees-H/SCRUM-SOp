@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Afmelden voor training</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="align-items-center">
            <form method="POST" action="signout">
                @csrf
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div>
                            <label for="name" class="col-sm-2 col-form-label">
                                <span class="requiredStar">*</span>Voor- en achternaam
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="bv: Jan de Graaf" name="name" value="{{old('name')}}" required autofocus>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="date" class="col-sm-2 col-form-label">
                                <span class="requiredStar">*</span>Datum
                            </label>
                            <div class="col-sm-8">
                                <input type="date" placeholder="dd-mm-yyyy" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{old('date')}}" required>
                            </div>
                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <br />

                <button type="submit" id="afmeldknop" name="afmeldknop" class="btn btn-primary">Afmelden
                </button>
            </form>
        </div>
    </div>

@stop
