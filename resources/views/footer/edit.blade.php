@extends('layouts.layout')

@section('content')

<div class='container'>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100 display-3">Footer aanpassen</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="POST" action="{{ route('footer.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="col-sm-3 col-form-label">
                                Secretariaat Stichting Special Golf:
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" placeholder="{{$footer->secretariaat}}" name="email"  value="{{old('email')}}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="text" class="col-sm-2 col-form-label">
                                Rekeningnummer Rabobank:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="rekeningnummer" placeholder="{{$footer->rekeningnummer}}" name="rekeningnummer"  value="{{old('rekeningnummer')}}">
                            </div>
                            @error('rekeningnummer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="number" class="col-sm-2 col-form-label">
                                KvK nummer:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="KvKnr" placeholder="{{$footer->KvKnr}}" name="KvKnr"  value="{{old('KvKnr')}}">
                            </div>
                            @error('KvKnr')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                        <label for="number" class="col-sm-2 col-form-label">
                                RSIN:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="RSIN" placeholder="{{$footer->RSIN}}" name="RSIN"  value="{{old('RSIN')}}">
                            </div>
                            @error('RSIN')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br />
                        <button type="submit" id="footerknop" name="footerknop" class="btn btn-outline-primary">
                            Footer aanpassen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop