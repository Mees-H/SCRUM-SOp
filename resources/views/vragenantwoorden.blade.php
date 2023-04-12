@extends('layouts.layout')

@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif
<div class="col">
    <a href="/vragenantwoorden/vraagformulier" class="btn-primary btn">Stel een vraag</a>
</div>
<br />
<div class="accordion">
@foreach($FAQ as $faq) 
  <div class="accordion-item">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
        <p class="accordion-header" id="{{$faq->id}}">
            <p>{{$faq->question}}</p>
        </p>
    </button>
    <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="Antwoord {{$faq->id}}" data-bs-parent="#accordion">
      <div class="accordion-body">
      {{$faq->answer}}
      </div>
    </div>
  </div>
@endforeach
</div>

@endsection