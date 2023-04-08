<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a class="navbar-brand text-dark" href="/index"><img src="/img/specialgolflogodark.png" aria-label="Logo van Special Golf Haverlij, een kleurrijke zwaan" id="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
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

                <a class="nav-link dropdown-toggle text-dark {{ (request()->segment(1) == 'galerij') ? 'font-weight-bold' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">

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
                <a class="nav-link text-dark {{ (request()->segment(1) == 'faq') ? 'font-weight-bold' : '' }}" href="/faq">FAQ</a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-dark {{ (request()->segment(1) == 'nieuwsbrief') ? 'font-weight-bold' : '' }}" href="/nieuwsbrief">Nieuws</a>--}}
{{--            </li>--}}
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
            <input class="form-control mr-sm-2 search"id="dropdown" type="search" name="search" placeholder="Zoek hier..." aria-label="Search" onkeyup="FilterWords()">
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
                <li><a class="dropdown-item text-center" href="/links">
                        Links
                    </a></li>
            </ul>
        </form>
    </div>
</nav>
