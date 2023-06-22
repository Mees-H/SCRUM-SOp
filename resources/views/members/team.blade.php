@extends('layouts.layout')

@section('content')

@foreach($groups as $group)
<article>
    <div class="container">
        <h2 class="text-center specialHeader">{{$group->name}}</h2>
        <br>
        <div class="row justify-content-md-left">
        @foreach($group->members as $member)

            <div class="col-sm-6">
                <div class="row">
                    @if($member->imgurl != '')
                        <div class="memberimg-box">
                            <img src="{{ asset('img/'.$member->imgurl) }}" alt="foto van {{$member->name}}" class="memberimg"/>
                        </div>
                    @else
                        <div class="memberimg-box"></div>
                    @endif
                    <p class="col">
                        <span>{{$member->name}}{{$member->function == '' ? '' : ' - '.$member->function}}</span><br>
                        <span>Email:</span>
                        <a href="mailto:{{$member->email}}" aria-labelledby="Dit is de email van {{$member->name}}">{{$member->email}}</a><br>
                        <span>{{$member->phonenumber == '' ? '' : 'Mobiel: '.$member->phonenumber}}</span>
                    </p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <hr/>
</article>
@endforeach
@stop
