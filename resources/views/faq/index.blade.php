@extends('layouts.layout')

@section('content')

<div class="accordion">
@foreach($FAQ as $faq) 
  <div class="accordion-item">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}}">
        <p class="accordion-header" id="{{$faq->id}}">
            <p>Vraag {{$faq->id}}: {{$faq->question}}</p>
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

<h1 class="display-3">FAQ</h1>
    <div>
        <a href="{{ route('faq.create')}}" class="btn btn-primary mb-3">Creeër nieuwe vraag & antwoord</a>
    </div>     
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Vraag</td>
                <td>Antwoord</td>
            </tr>
        </thead>
        <tbody>
            @foreach($FAQ as $faq)
                <tr>
                    <td>{{$faq->id}}</td>
                    <td>{{$faq->question}} </td>
                    <td>{{$faq->answer}}</td>
                    <td>
                        <a href="{{ route('faq.edit',$faq->id)}}" class="btn btn-primary">Aanpassen</a>
                    </td>
                    <td>
                        <form action="{{ route('faq.destroy', $faq->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection