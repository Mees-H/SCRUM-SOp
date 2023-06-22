@extends('layouts.layout')

@section('content')
<div class="container">
    @foreach($trainingGroups as $group)

        <h2 class="specialHeader">Traininggroep {{$group->id}}</h2>
        <br />
        <div class="table-container">
            <table tabindex=0 class="table table-bordered w-auto">
                <tr>
                    <th>Datum</th>
                    @foreach($group->sessions as $session)
                        <td class="p-1 verticalText text-center">
                            <p class="m-0">{{ \Carbon\Carbon::parse($session->Date)->format('d-m-Y')}}</p>
                        </td>
                    @endforeach
                </tr>
                <tr>
                <th>Tijd</th>
                @foreach($group->sessions as $session)
                    <td class="p-1 small verticalText">{{date('H:i', strtotime($session->StartTime))}}-{{date('H:i', strtotime($session->EndTime))}}</td>
                @endforeach
                </tr>
                <tr>
                    <th>Week</th>
                    @foreach($group->sessions as $session)
                        <td class="p-1 verticalText">W{{$session->weekNumber}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Leden</th>
                    @foreach($group->sessions as $session)
                        @if(!$session->IstrainingSession)
                            <td rowspan='{{$group->participants->count()+1}}'
                                class="p-1 small verticalText vacationSession text-center">{{$session->Description}}</td>
                        @else
                            <td rowspan='{{$group->participants->count()+1}}'
                                class="p-1 small verticalText text-center">
                                {{$session->Description}}
                            </td>
                        @endif
                    @endforeach
                </tr>
                @foreach($group->participants as $participant)
                    <tr>
                        <td class="small mw-25">{{$participant->Name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br />
        <hr/>
    @endforeach

</div>
@stop
