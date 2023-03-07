<html>
    <head>
        <title>Special Golf Haverlij</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
            <a class="nav-link dropdown-toggle {{ (request()->segment(1) == 'gallerij') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gallerij
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/gallerij/2023">2023</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/gallerij/2022">2022</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/gallerij/2021">2021</a></li>
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
            </ul>
        </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>