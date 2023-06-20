@extends('layouts.layout')

@section('content')
    <div class="row align-items-center">
        <h1 class="col">Partners {{$year}}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="row row-cols-sm-4 g-4 justify-content-evenly">
            @for($i = 0; $i < $groups->count(); $i++)
                @if($groups[$i]->currently_a_partner)
                    <div class="col-sm">
                        <div class="card p-1 h-100">
                            <img src="{{asset('img/'.$groups[$i]->imageurl)}}" class="card-img-top img-fluid"
                                 alt="Logo van {{$groups[$i]->name}}">
                            <div class="card-body">
                                <p class="card-text">
                                @if ($i == 0)
                                    <a href="https://{{$groups[$i]->link}}"
                                        aria-label="Link naar de site van {{$groups[$i]->name}}" autofocus>
                                @else
                                    <a href="https://{{$groups[$i]->link}}"
                                        aria-label="Link naar de site van {{$groups[$i]->name}}">
                                @endif

                                        <i class="fa-regular fa-building"></i> {{$groups[$i]->name}}
                                    </a>
                                <div>
                                    <i class="fa-solid fa-mobile-screen"></i> {{$groups[$i]->contact_person}}
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <br>
@stop
