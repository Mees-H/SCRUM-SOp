@extends('layouts.layout')

@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif
<div class="justify-content-between d-flex">
    <div>
        <h1 class="display-3">FAQ</h1>
    </div>
    <div>
    <a href="/vragenantwoorden/vraagformulier" class="btn-primary btn mt-4">Stel een vraag</a>
    </div>
</div>
        <br/>
<div class="accordion">
@foreach($FAQ as $faq)
  <div class="accordion-item">
    <a class="btn button accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
        <div class="accordion-header" id="{{$faq->id}}">
            <p>{{$faq->question}}</p>
        </div>
    </a>
    <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="Antwoord {{$faq->id}}" data-bs-parent="#accordion">
      <div class="accordion-body">
      {{$faq->answer}}
      </div>
    </div>
  </div>
@endforeach
</div>
@stop
