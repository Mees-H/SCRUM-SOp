@extends('layouts.layout')

@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif
<div class="justify-content-between d-flex">
    <div>
        <h1>Veelgestelde Vragen</h1>
    </div>
    <div>
    <a href="/vragenantwoorden/vraagformulier" class="btn-primary btn mt-4">Stel een vraag</a>
    </div>
</div>
        <br/>
<div class="accordion">
@foreach($FAQ as $faq)
  <div class="accordion-item">
      <div class="accordion-header text-decoration-none  text-black" id="{{$faq->id}}">
    <button class="btn button accordion-button collapsed" alt="vraag {{$faq->question}} openen of sluiten" type="button" data-bs-toggle="collapse"  data-bs-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
            {{$faq->question}}
    </button>
      </div>
    <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="Antwoord {{$faq->id}}" data-bs-parent="#accordion">
      <div class="accordion-body">
      {{$faq->answer}}
      </div>
    </div>
  </div>
@endforeach
</div>
@stop
