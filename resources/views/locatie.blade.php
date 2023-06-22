@extends('layouts.layout')

@section('content')
    <div class="container justify-content-center text-center col-sm-9 specialText">
        <p>
            <b>Golfclub BurgGolf Haverleij</b> is gelegen in Engelen, gemeente ’s-Hertogenbosch.
            De baan heeft <b>18 holes</b> en is een ontwerp van de Engelse golfbaan architect Donald Steel (28.8.1937).
            Naast de 18 holes baan beschikt de Golfclub over een <b>par-3</b> (9 holes) baan, <b>driving range</b> en <b>oefengreen</b>.
            De receptie kan uw vragen beantwoorden en het clubhuis ontvangt u graag voor een drankje en een hapje.
        </p>
        <hr>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2471.459788483588!2d5.252346377622393!3d51.724625094810094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6edf28088a929%3A0xc7c218087da49649!2sLeunweg%2040%2C%205221%20BC%20&#39;s-Hertogenbosch!5e0!3m2!1snl!2snl!4v1687383382864!5m2!1snl!2snl"
                class="w-100" style="border:0; height: 25vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <hr>
        <div class="d-flex flex-wrap justify-content-around">
            <img src="{{ asset('img/locatie_img_1.jpeg') }}" class="img-fluid" style="width: 200px" alt="Foto van de locatie">
            <img src="{{ asset('img/locatie_img_2.jpeg') }}" class="img-fluid" style="width: 200px" alt="Foto van de locatie">
            <img src="{{ asset('img/locatie_img_3.jpeg') }}" class="img-fluid" style="width: 200px" alt="Foto van de locatie">
            <img src="{{ asset('img/locatie_img_4.jpeg') }}" class="img-fluid" style="width: 200px" alt="Foto van de locatie">
        </div>
        <hr>
    </div>


@stop
