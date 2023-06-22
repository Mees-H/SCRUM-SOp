@extends('layouts.layout')

@section('content')
<div class="p-0">
    <div id="carouselExampleCaptions" data-bs-interval="false" class="carousel slide">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="slider-image text-center">
                    <img src="{{  asset('img/'.$slider->image) }}" class="img-fluid w-100" style="max-height: 400px;" alt="Foto's van de vereniging">
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Vorige</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Volgende</span>
        </button>
    </div>
    <div class="container justify-content-center text-center col-sm-9 specialText">
        <div class="m-4">
            <h2 class="specialHeader mt-5">Stichting Special Golf</h2>
            <p class="fw-bold">
                Sporten en met name Special Golf is bouwen aan eigenwaarde, sociale vaardigheden, gezond blijven en plezier beleven
            </p>
            <div class="fw-bold">
                Doel: mensen met een verstandelijke beperking laten kennismaken met- en integreren in- de golfsport.
            </div>
            <div>
                Belangrijke aspecten hiervan zijn: contact met de golfleraren, begeleiders en medespelers, buiten zijn in een mooie omgeving, 
                fysiek bezig zijn met een sport (waarbij het risico op blessures laag is), leren en respecteren van de golfregels en de etiquette. 
                Na het golf samen genieten van een drankje en bezoeken van andere golfclubs voor onderlinge wedstrijden tegen andere golf-teams.
            </div>
            <div>
                Na het golf samen genieten van een drankje en bezoeken van andere golfclubs voor onderlinge wedstrijden tegen andere golf-teams.
            </div>
        </div>
        <div class="row m-4">
            <div class="col-sm-6">
                <h2 class="specialHeader">De start</h2>
                <div>
                    <strong>1 juni 2021.</strong> De commissie Special Golf, in samenwerking met BurgGolf Haverleij, golf coaches en vrijwilligers, 
                    zet zich in om mensen met een verstandelijke beperking te laten deelnemen aan de golfsport tijdens de oefensessies op zaterdagen. 
                    In 2021 is gestart met Special Golf met als thuisbasis BurgGolf Haverleij, waar Special Golf deelnemers zich thuis voelen en kunnen 
                    integreren als golfer. Professionals en vrijwilligers zetten zich in, om de deelnemers vaardigheden aan te leren om zich het golfen eigen te maken. 
                    Dank aan Leo van de Meer golfprofessional en inspirator van het eerste uur,  Wim Jansen als coördinator, vrijwilligers, 
                    het management dat BurgGolf Haverleij open stelt voor Special Golf (G-Golf) en aan de verenigingsleden van BurgGolf die bij ontbinding van de vereniging, 
                    eind 2021, een genereus financieel gebaar hebben gemaakt.
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="specialHeader">365 dagen</h2>
                <div>
                    <strong>1 juni 2022.</strong> Het initiatief om mensen met een verstandelijke beperking te laten golfen, heeft geleid tot deelname van vijftien deelnemers. 
                    Golfprofessionals Naud Bank en Suzanne Lanfermeijer als vaste waarde hebben hun vaardigheden en kennis ingezet om de deelnemers de beginselen van het golfen aan te leren. 
                    De inzet van de Golfprofessionals en begeleiders verdient een welgemeend compliment, zij stonden de zaterdagen klaar voor de deelnemers. 
                    Eind juli 2022 gaan we kort met zomerreces en starten 3 september 2022 weer met de oefensessies op de zaterdagen. 
                    Het team bestaat inmiddels uit Golfprofessional Naud Bank en Robbin Schuurman, bijgestaan door de begeleiders Hetty Stoof, Edith Reek, Karl Stoof, Lau Verhoeven, Edwin Bijlsma, Hans van Ettekoven en Marcel Bosboom. 
                    De werkwijze, ambitie en het succes van Special Golf Haverleij in 2021 en 2022, zal worden voortgezet in 2023.
                </div>
            </div>
        </div>
        <hr class="hrheight"/>
        <div class="m-4">
            <h2 class="specialHeader">2020 - 2022</h2>
            <p>
                <div>
                    Bij de voorbereiding in <strong>2020</strong> hebben Leo van der Meer en Wim Jansen de tijdslijn uitgestippeld om mensen met een verstandelijk beperking deel te laten nemen aan de golfsport. 
                    Gedurende de voorbereidingen, waar gesproken is met BurgGolf Haverleij, Golfleraren, Cello-Zorg, potentiële sponsoren, het werven van vrijwilligers en bezoeken aan G-Golf clubs, zijn we in juni 2021, 
                    onder de naam Special Golf Haverleij van start gegaan met vijftien deelnemers op de zaterdagmiddagen.
                </div>
                <div>
                    De achter ons liggende golfseizoenen, <strong>2021</strong> en <strong>2022</strong>, werden door alle bij Special Golf betrokken gekenmerkt als leerzaam, ontspannend en prettig. 
                    Op <strong>26 november 2022</strong> was de laatste oefensessie voor de winterstop op BurgGolf Haverleij. We  gaan met 13 deelnemers weer van start op <strong>4 maart 2023</strong>,  met  ondersteuning van golfleraren, vrijwilligers en BurgGolf Haverleij.
                </div>
            </p>
            <div>
                <img class="m-t-2 w-auto h-100" src="img/startpagina1.jpg" alt="foto van de 13 huidige deelnemers, de vrijwilligers en de golfleraren">
            </div>
        </div>
        <hr/>
        <div class="m-4">
            <h2 class="specialHeader">Help ons verder met Special Golf</h2>
            <p>
                <div>
                    Om Special Golf gezond te houden en daarmee mensen met een beperking blijvend aan golf te laten deelnemen, zijn sponsoren en donateurs onontbeerlijk, zodat zij naast het aanleren van golfvaardigheden ook sociaal en maatschappelijk kunnen integreren binnen de golfsport. 
                    <strong>Draagt u ook een steentje bij!</strong> Dat kan al via een donatie van <strong>€ 5,00</strong> op bankrekeningnummer --------  o.v.v. donatie. Uw donatie wordt bijzonder op prijs gesteld.
                </div>
            </p>
            <div class="row">
                <div class="col-sm-4">
                    <img class="" src="img/startpagina2.jpg">
                </div>
                <div class="col-sm-4">
                    <img class="" src="img/startpagina3.jpeg">
                </div>
                <div class="col-sm-4">
                    <img class="" src="img/startpagina4.jpg">
                </div>
            </div>
        </div>

    </div>
</div>

@stop
