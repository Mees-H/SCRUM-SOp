@extends('layouts.layout')

@section('content')

<div class="accordion">
@foreach($FAQ as $faq) 
  <div class="accordion-item">
    <h2 class="accordion-header" id="{{$faq->id}}">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
        <p>Vraag {{$faq->id}}: {{$faq->question}}</p>
      </button>
    </h2>
    <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="Antwoord {{$faq->id}}" data-bs-parent="#accordion">
      <div class="accordion-body">
      {{$faq->answer}}
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection