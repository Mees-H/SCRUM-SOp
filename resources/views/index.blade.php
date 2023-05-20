@extends('layouts.layout')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                    <div id="carouselExampleCaptions" data-bs-interval="false" class="carousel slide" >
                        <div class="carousel-inner ">
                            @foreach($sliders as $slider)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <div class="slider-image text-center">
                                        <img src="{{  asset('img/'.$slider->image) }}" class="d-inline-block border text-center rounded" alt="Foto's van de vereniging">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Vorige</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Volgende</span>
                    </button>
                </div>
            </div>
        </div>
</div>
@stop
