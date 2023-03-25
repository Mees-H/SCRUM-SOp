<!doctype html>
<html lang="nl">
    <head>
        <title>Special Golf Haverlij</title>
        <link rel="stylesheet" href="{{ asset('/css/dropdown.css') }} ">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="{{ asset('/js/dropdown.js') }}" defer></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <a class="navbar-brand text-dark" href="/index"><img src="/img/specialgolflogodark.png" aria-label="Logo van Special Golf Haverlij, een kleurrijke zwaan" id="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'index') ? 'font-weight-bold' : '' }}" href="/index">Startpagina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'training') ? 'font-weight-bold' : '' }}" href="/training">Trainingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'evenement') ? 'font-weight-bold' : '' }}" href="/evenement">Evenementen</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark {{ (request()->segment(1) == 'galerij') ? 'font-weight-bold' : '' }}" href="/galerij" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link text-dark {{ (request()->segment(1) == 'aanmelden') ? 'font-weight-bold' : '' }}" href="/aanmelden">Aanmelden</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'faq') ? 'font-weight-bold' : '' }}" href="/faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'nieuwsbrief') ? 'font-weight-bold' : '' }}" href="/nieuwsbrief">Nieuws</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'team') ? 'font-weight-bold' : '' }}" href="/team">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'partner') ? 'font-weight-bold' : '' }}" href="/partner">Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'overons') ? 'font-weight-bold' : '' }}" href="/overons">Over Ons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'locatie') ? 'font-weight-bold' : '' }}" href="/locatie">Locatie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ (request()->segment(1) == 'links') ? 'font-weight-bold' : '' }}" href="/links">Links</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 position-relative" method="GET" action="#" >
                <input class="form-control mr-sm-2 search" id="dropdown" type="search" name="search" placeholder="Zoek hier..." aria-label="Search" onkeyup="FilterWords()">
                <ul class="border border-dark rounded d-none" id="content">
                    <li><a class="dropdown-item text-center" href="/index">
                        Hoofdpagina
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/training">
                        Trainingen
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/evenement">
                        Evenementen
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/galerij/2023">
                        2023
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/galerij/2022">
                        2022
                    </a></li>
                    <li> <a class="dropdown-item text-center" href="/galerij/2021">
                        2021
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/aanmelden">
                        Aanmelden
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/faq">
                        FAQ
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/nieuwsbrief">
                        Nieuwsbrief
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/team">
                        Team
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/partner">
                        Partner
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/overons">
                        Over Ons
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/locatie">
                        Locatie
                    </a></li>
                    <li><a class="dropdown-item text-center" href="/links/show">
                        Links
                    </a></li>
                </ul>
                </form>

        </div>
        </nav>



        <div class="container">
            @yield('content')
        </div>
        <footer>
          <div class="footer-content bg-light">
           <div class="footer-info">
          <p class="text-dark">Secretariaat Stichting Special Golf: specialgolfhaverleij@gmail.com</p>
          <p class="text-dark">Rekeningnummer Rabobank: NL 38 RABO 0118102206 o.v.v. Special Golf</p>
          <p class="text-dark">KvK nr. 88714543 - RSIN 864744328 - ANBI</p>
          </div>
          <ul class='socials text-dark'>
             <li><a class="text-dark" aria-label="Icoontje met link naar het Facebook account van Special Golf Haverlij" href=https://www.facebook.com/DeHaverleij/?locale=nl_NL  ><i class="fa-brands fa-facebook" ></i></a></li>
             <li><a class="text-dark" aria-label="Icoontje met link naar het Instagram account van Special Golf Haverlij" href=https://www.instagram.com/specialgolf2021/  ><i class="fa-brands fa-instagram"></i></a></li>
          </ul>

          </div>
        </footer>
    </body>
</html>
