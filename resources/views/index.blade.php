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
            <div class="container justify-content-center text-center col-sm-9 fw-bold">
                <h1 class="specialHeader">Stichting Special Golf</h1>
                <p>
                    Sporten en met name Special Golf is bouwen aan eigenwaarde, sociale vaardigheden, gezond blijven en plezier beleven
                </p>
                <p>
                    Doel: mensen met een verstandelijke beperking laten kennismaken met- en integreren in- de golfsport.
                </p>
                <p class="fw-normal">
                    Belangrijke aspecten hiervan zijn: contact met de golfleraren, begeleiders en medespelers, buiten zijn in een mooie omgeving, fysiek bezig zijn met een sport (waarbij het risico op blessures laag is), leren en respecteren van de golfregels en de etiquette. Na het golf samen genieten van een drankje en bezoeken van andere golfclubs voor onderlinge wedstrijden tegen andere golf-teams.
                </p>
            </div>
        </div>
</div>
@stop
