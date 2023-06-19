<!-- Layout als je wel ingelogd bent-->
<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a class="navbar-brand text-dark" href="/">
        <img src="{{asset("/img/specialgolflogodark.png")}}"
             aria-label="Logo van Special Golf Haverlij, een kleurrijke zwaan"
             alt="logo Special Golf" id="logo"></a>

    <a class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar"
       aria-controls="main-navbar" aria-label="Toggle navigation"
       id="navbar_toggle">
                <span class="img-fluid">
                    <img class="burger_menu_icon" src="{{asset("/img/burger-menu.png")}}"
                         alt="burger menu icon"/></span>
    </a>
    <div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav me-auto nav-tabs">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownActiviteiten" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Activiteiten
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'training') ? 'font-weight-bold' : '' }}"
                   href="/trainingsessions">Trainingen</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'evenement') ? 'font-weight-bold' : '' }}"
                   href="/events">Evenementen</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownFotos" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Foto's
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownFotos">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'galerij') ? 'font-weight-bold' : '' }}"
                   href="/galerij">Galerij</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'slider') ? 'font-weight-bold' : '' }}"
                   href="/slider">Slider</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ (request()->segment(1) == 'faq') ? 'font-weight-bold' : '' }}"
           href="/faq">Veelgestelde vragen</a>
    </li>
    <li class="nav-item dropdown">
        <a dusk="activiteiten" class="nav-link dropdown-toggle text-dark" id="navbarDropdownNieuws" role="button"
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
        <a class="nav-link text-dark {{ (request()->segment(1) == 'groups') ? 'font-weight-bold' : '' }}"
           href="/groups">Partners</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownOrganisatie" role="button"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
            Organisatie
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'createuser') ? 'font-weight-bold' : '' }}"
                   href="/admin/gebruikers">Gebruikers</a>
            <li class="nav-item">
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'team') ? 'font-weight-bold' : '' }}"
                   href="/members">Team</a>
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
                   href="/privacy/edit">Privacy</a>
            </li>
        </ul>
    </li>
</ul>
<ul class="navbar-nav ms-auto">
    <li class="nav-item dropdown">
        <a class="btn border-0 dropdown-toggle hidden-arrow {{ (request()->segment(1) == 'profile') ? 'font-weight-bold' : '' }}" type="button" id="dropdown_account" data-bs-toggle="dropdown">
            {{ Auth::user()->name }}
            <span class="img-fluid">
                        <img class="burger_menu_icon" src="{{asset("/img/user.png")}}"
                             alt="user image"/>
                   </span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdown_account">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"> <i class="fas fa-user-alt pe-2"></i>Mijn Profiel</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" class="dropdown-item nav-link text-dark"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-door-open pe-2"></i>
                        Uitloggen
                    </a>
                </form>
            </li>
        </ul>
    </li>
    <li id="searchNavBar">
        <input class="form-control mr-sm-2 search" id="dropdown" type="search" name="search"
               placeholder="Zoek hier..." aria-label="Search" onkeyup="FilterWords()">
        <ul class="border border-dark rounded d-none" id="content">
            <li><a class="dropdown-item text-center searchitem" href="/">
                    Hoofdpagina
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/training">
                    Trainingen
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/evenement">
                    Evenementen
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/galerij">
                    Galerij
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/faq">
                    FAQ
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/nieuwsartikel">
                    Nieuwsartikelen
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/nieuwsbrief">
                    Nieuwsbrieven
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/team">
                    Team
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/partner">
                    Partner
                </a></li>
            <li><a class="dropdown-it">
                <hr class="dropdown-divider">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark dropdown-item {{ (request()->segment(1) == 'privacy') ? 'font-weight-bold' : '' }}"
                   href="/privacy">Privacy</a>
            </li>
            <li><a class="dropdown-item text-center searchitem" href="/overons">
                    Over Ons
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/locatie">
                    Locatie
                </a></li>
            <li><a class="dropdown-item text-center searchitem" href="/links">
                    Links
                </a></li>
        </ul>
    </li>
</ul>
</div>
</nav>
