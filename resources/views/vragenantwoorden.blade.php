@extends('layouts.layout')

@section('content')
<div class="container">
@if(session()->get('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif
<div class="justify-content-between d-flex">
    <div>
    <a href="/vragenantwoorden/vraagformulier" class="btn-primary btn mt-4" autofocus>Stel een vraag</a>
    </div>
</div>
<br/>


<div class="card">
  <div class="container card-body">
    <p>Heeft u een vraag? Wij beantwoorden deze graag!</p>
    <p>Staat uw vraag niet in het overzicht hieronder dan kunt u deze vraag stellen via de bovenliggende "Stel een vraag" knop.</p>
    <p>Uw vraag wordt via email verzonden en de reactie krijgt u ook via de mail, daarom vragen wij u ook om uw emailadres in te vullen wanneer u een vraag stelt.</p>
    <p>Wij streven ernaar uw vraag binnen 24 uur te beantwoorden.</p>
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
</div>
@stop
