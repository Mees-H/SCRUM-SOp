@extends('layouts.layout')
 
@section('content')
<div class="container text-center">
    <div class="row align-items-center">
        <h1 class="col">Team samenstelling</h1>
        <div class="col">
            <a class="btn btn-primary" href="/team">Team onderhouden</a>
        </div>
    </div>
</div>

@foreach($groups as $group)
<article>
    <div class="container">
        <h1 class="text-center">{{$group->name}}</h1>
        <div class="row justify-content-md-left">
        @for($iterator = 0; $iterator < count($group->members); $iterator++)
            <div class="col-sm-6">
            @php $member = $group->members[$iterator]; @endphp
                <div class="row">
                    @if($group->name != 'Begeleiders')
                        <p class="col">
                            {{$member->name}}{{$member->function == '' ? '' : ' - '.$member->function}}<br>
                            E-mail: {{$member->email}}<br>
                            {{$member->phonenumber == '' ? '' : 'Mobiel: '.$member->phonenumber}}
                        </p>
                        @if($member->imgurl != '')
                            <img src="{{ asset($member->imgurl) }}" alt="foto van {{$member->name}}" class="memberimg"/>
                        @endif
                    @else
                        <p class="col">
                            {{$member->name}}<br>
                            E-mail: {{$member->email}}<br>
                        </p>
                    @endif
                </div>
            </div>
        @endfor
        </div>
    </div>
    <hr>
</article>
@endforeach
@stop