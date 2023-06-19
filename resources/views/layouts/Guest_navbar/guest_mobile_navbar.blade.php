<nav class="navbar navbar-expand-xl navbar-light bg-light">


    <a class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar"
       aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation"
       id="navbar_toggle">
                <span class="img-fluid">
                    <img class="burger_menu_icon" src="{{asset("/img/burger-menu.png")}}"
                         alt="burger menu icon"/></span>
    </a>
    <a class="navbar-brand text-dark" href="/">
        <img src="{{asset("/img/specialgolflogodark.png")}}"
             aria-label="Logo van Special Golf Haverlij, een kleurrijke zwaan"
             alt="logo Special Golf" id="logo"></a>
    <div class="nav-item dropdown">

        <a class="btn border-0 dropdown-toggle hidden-arrow {{ (request()->segment(1) == 'profile') ? 'font-weight-bold' : '' }}" type="button" id="dropdown_account" data-bs-toggle="dropdown">
            <span class="img-fluid">
                        <img class="burger_menu_icon" src="{{asset('/img/enter.png')}}" alt="Inloggen"/>
                   </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown_account">
        <li><a class="dropdown-item"
               href="/login"> <i class="fas fa-user-alt pe-2"></i>Inloggen</a></li>
        </ul>


    </div>
    <div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav me-auto nav-tabs">
    <li>
    <ul class="navbar-nav d-flex">
        <li class="nav-item" id="searchNavBar">
            <form class="form-inline my-2 my-lg-0 position-relative justify-content-center d-flex" method="GET" action="#">
                <input class="form-control align-content-center search" id="dropdown" type="search" name="search"
                       placeholder="Zoek hier..." aria-label="Search" onkeyup="FilterWords()">
                <ul class="border border-dark rounded d-none" id="content">
                    <li><a class="dropdown-item text-center" href="/">
                            Hoofdpagina
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/training">
                            Trainingen
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/evenement">
                            Evenementen
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/albums/2023">
                            2023
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/albums/2022">
                            2022
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/albums/2021">
                            2021
                        </a></li>
                    <li><a class="dropdown-item text-center" href="/vragenantwoorden">
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
        </li>
    </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownActiviteiten" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Activiteiten
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'training') ? 'font-weight-bold' : '' }}"
                   href="/training">Trainingen</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'evenement') ? 'font-weight-bold' : '' }}"
                   href="/evenement">Evenementen</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle text-dark {{ (request()->segment(1) == 'galerij') ? 'font-weight-bold' : '' }}"
           id="navbarDropdownGalerij" role="button" data-bs-toggle="dropdown" aria-haspopup="true" href="#">
            Galerij
        </a>

        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(count($allYears) > 0)
                @foreach($allYears as $year)
                    <li><a class="dropdown-item nav-link text-dark"
                           href="{{ route('galerij_jaar', $year) }}">{{$year}}</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                @endforeach
            @else
                <li><a class="dropdown-item">Nog geen galerij zichtbaar</a></li>
            @endif
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ (request()->segment(1) == 'faq') ? 'font-weight-bold' : '' }}"
           href="/vragenantwoorden">Veelgestelde vragen</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownNieuws" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
           Nieuws
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'nieuwsartikel') ? 'font-weight-bold' : '' }}"
                   href="/nieuwsartikel">Nieuwsartikelen</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'nieuwsbrief') ? 'font-weight-bold' : '' }}"
                   href="/nieuwsbrief">Nieuwsbrieven</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ (request()->segment(1) == 'partner') ? 'font-weight-bold' : '' }}"
           href="/partner">Partners</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownOrganisatie" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Organisatie
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'team') ? 'font-weight-bold' : '' }}"
                   href="/team">Team</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'overons') ? 'font-weight-bold' : '' }}"
                   href="/overons">Over Ons</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'locatie') ? 'font-weight-bold' : '' }}"
                   href="/locatie">Locatie</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'links') ? 'font-weight-bold' : '' }}"
                   href="/links">Links</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'privacy') ? 'font-weight-bold' : '' }}"
                   href="/privacy">Privacy</a>
            </li>
        </ul>
    </li>
</ul>

</div>
</nav>
@if($banner_title != '')
<div class="container-fluid mb-3 bannercontainer" style="user-select: none;">
  <div class="row">
    <div class="col-md-12 p-0">
      <div class="position-relative">
        <img src="{{ asset($banner_path) }}" alt="Banner" class="img-fluid w-100 opacity-75 bannerimage">
        <h1 class="position-absolute top-50 start-50 translate-middle text-center">{{ $banner_title }}</h1>
      </div>
    </div>
  </div>
</div>
@endif
