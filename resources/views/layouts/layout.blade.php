<html lang="nl">
    <head>
        <title>Special Golf Haverlij</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/dropdown.css') }} ">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="{{ asset('/js/dropdown.js') }}" defer></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/index">Special Golf Haverlij</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'index') ? 'active' : '' }}" href="/index">Hoofdpagina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'training') ? 'active' : '' }}" href="/training">Trainingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'evenement') ? 'active' : '' }}" href="/evenement">Evenementen</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ (request()->segment(1) == 'galerij') ? 'active' : '' }}" href="/galerij" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Galerij
            </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(count($allYears) > 0)
                        @foreach($allYears as $year)
                            <li><a class="dropdown-item" href="{{ route('galerij_jaar', $year) }}">{{$year}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                    @else
                        <li><a class="dropdown-item">Nog geen galerij zichtbaar</a></li>
                    @endif
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'aanmelden') ? 'active' : '' }}" href="/aanmelden">Aanmelden</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'faq') ? 'active' : '' }}" href="/faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'nieuwsbrief') ? 'active' : '' }}" href="/nieuwsbrief">Nieuwsbrief</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'team') ? 'active' : '' }}" href="/team">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'partner') ? 'active' : '' }}" href="/partner">Partner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'overons') ? 'active' : '' }}" href="/overons">Over Ons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'locatie') ? 'active' : '' }}" href="/locatie">Locatie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->segment(1) == 'links') ? 'active' : '' }}" href="/links">Links</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="GET" action="#" >
                <input class="form-control mr-sm-2 search" id="dropdown" type="search" name="search" placeholder="Zoek hier..." aria-label="Search" onkeyup="FilterWords()">
            </form>

        </div>
        </nav>
        <div class="border border-dark rounded float-right d-none marginright" id="content">
            <a class="dropdown-item text-center" href="/index">
                Hoofdpagina
            </a>
            <a class="dropdown-item text-center" href="/training">
                Trainingen
            </a>
            <a class="dropdown-item text-center" href="/evenement">
                Evenementen
            </a>
            <a class="dropdown-item text-center" href="/galerij/2023">
                2023
            </a>
            <a class="dropdown-item text-center" href="/galerij/2022">
                2022
            </a>
            <a class="dropdown-item text-center" href="/galerij/2021">
                2021
            </a>
            <a class="dropdown-item text-center" href="/aanmelden">
                Aanmelden
            </a>
            <a class="dropdown-item text-center" href="/faq">
                FAQ
            </a>
            <a class="dropdown-item text-center" href="/nieuwsbrief">
                Nieuwsbrief
            </a>
            <a class="dropdown-item text-center" href="/team">
                Team
            </a>
            <a class="dropdown-item text-center" href="/partner">
                Partner
            </a>
            <a class="dropdown-item text-center" href="/overons">
                Over Ons
            </a>
            <a class="dropdown-item text-center" href="/locatie">
                Locatie
            </a>
            <a class="dropdown-item text-center" href="/links">
                Links
            </a>
        </div>


        <div class="container">
            @yield('content')
        </div>
        <footer>
          <div class="footer-content">
           <div class="footer-info">
          <p>Secretariaat Stichting Special Golf: specialgolfhaverleij@gmail.com</p>
          <p>Rekeningnummer Rabobank: NL 38 RABO 0118102206 o.v.v. Special Golf</p>
          <p>KvK nr. 88714543 - RSIN 864744328 - ANBI</p>
          </div>
          <ul class='socials'>
             <li><a alt="link naar het facebook account" href=https://www.facebook.com/DeHaverleij/?locale=nl_NL  ><i class="fa-brands fa-facebook" ></i></a></li>
             <li><a alt="link naar het instagram account" href=https://www.instagram.com/specialgolf2021/  ><i class="fa-brands fa-instagram"></i></a></li>
             <!-- <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
             <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li> -->
          </ul>

          </div>
        </footer>
    </body>
</html>
