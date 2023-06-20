@extends('layouts.layout')

@section('content')
    <div class="container">
        <div style='text-align: center;' class='mb-4'>
        Zonder onze donateurs en sponsoren staan we nergens. Dankzij hun kunnen wij mensen met een verstandelijke beperking <br />
        golfvaardigheden aanleren met ondersteuning van golfprofessionals en vrijwilligers. Trots op onze partners!
        </div>
        <div class="row row-cols-sm-4 g-4 justify-content-evenly">
            @for($i = 0; $i < $groups->count(); $i++)
                @if($groups[$i]->currently_a_partner)
                    <div class="col-sm">
                        <div class="card p-1 h-100">
                            <img src="{{asset('img/'.$groups[$i]->imageurl)}}" class="card-img-top img-fluid"
                                 alt="Logo van {{$groups[$i]->name}}">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="https://{{$groups[$i]->link}}"
                                       aria-label="Link naar de site van {{$groups[$i]->name}}">
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
