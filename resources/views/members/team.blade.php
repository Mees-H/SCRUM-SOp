@extends('layouts.layout')
 
@section('content')
<div class="container text-center">
    <div class="row align-items-center">
        <h1 class="col">Team samenstelling</h1>
    </div>
</div>
<br>

@foreach($groups as $group)
<article>
    <div class="container">
        <h1 class="text-center">{{$group->name}}</h1>
        <br>
        <div class="row justify-content-md-left">
        @foreach($group->members as $member)
            <div class="col-sm-6">
                <div class="row">
                    @if($member->imgurl != '')
                        <div class="memberimg-box">
                            <img src="{{ asset('storage/img/teammembers/'.$member->imgurl) }}" alt="foto van {{$member->name}}" class="memberimg"/>
                        </div>
                    @endif
                    <p class="col">
                        {{$member->name}}{{$member->function == '' ? '' : ' - '.$member->function}}<br>
                        E-mail: {{$member->email}}<br>
                        {{$member->phonenumber == '' ? '' : 'Mobiel: '.$member->phonenumber}}
                    </p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <hr>
</article>
@endforeach
@stop