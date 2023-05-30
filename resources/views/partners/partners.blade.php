@extends('layouts.layout')
 
@section('content')
<div class="row align-items-center">
    <h1 class="col">Partners {{$year}}</h1>
</div>
<hr>
<div class="container">
    <div class="row row-cols-sm-4 g-4 justify-content-evenly">
    @for($i = 0; $i < $groups->count(); $i++)
        <!--Next row-->
        <div class="col-sm">
            <div class="card p-1 h-100">
                <img src="{{$groups[$i]->imageurl}}" class="card-img-top" alt="Logo van {{$groups[$i]->name}}">
                <div class="card-body">
                    <p class="card-text">
                        <a href="https://{{$groups[$i]->link}}" aria-label="Link naar de site van {{$groups[$i]->name}}">
                            <i class="fa-regular fa-building"></i> {{$groups[$i]->name}}
                        </a>
                        <p>
                            <i class="fa-solid fa-mobile-screen"></i> {{$groups[$i]->contact_person}}
                        </p>
                    </p>
                </div>
            </div>
        </div>
    @endfor
    </div>
</div>
<br>
@stop