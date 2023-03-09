<html lang="nl">
    <head>
        <title>Special Golf Haverlij</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/public/app.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
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
            <a class="nav-link dropdown-toggle {{ (request()->segment(1) == 'galerij') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Galerij
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/galerij/2023">2023</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/galerij/2022">2022</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/galerij/2021">2021</a></li>
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
        </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <footer>
          <div class="footer-content">
          <p>Secretariaat Stichting Special Golf: specialgolfhaverleij@gmail.com</p>
          <p>Rekeningnummer Rabobank: NL 38 RABO 0118102206 o.v.v. Special Golf</p>
          <p>KvK nr. 88714543 - RSIN 864744328 - ANBI</p>

          <ul class='socials'>
             <li alt="link naar het facebook account"><a href=https://www.facebook.com/DeHaverleij/?locale=nl_NL ><i class="fa-brands fa-facebook" ></i></a></li>
             <li  alt="link naar het instagram account"><a href=”https://www.instagram.com/specialgolf2021/”><i class="fa-brands fa-instagram"></i></a></li>
             <li  alt="link naar het twitter account"><a href=”https://twitter.com/BGHaverleij”><i class="fa-brands fa-twitter"></i></a></li>
             <li  alt="link naar het linkedin account"><a href=”#”><i class="fa-brands fa-linkedin"></i></a></li>
          </ul>

          </div>
        </footer>
    </body>
</html>