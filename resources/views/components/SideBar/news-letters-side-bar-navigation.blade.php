<head>
    <link rel="stylesheet" href="{{ asset('css/News.css') }}" />
    <title>NavigationSideBar</title>
</head>

<div class="wrapper p-3 bg-white card">
    <nav id="sidebar">
        <div class="sidebar-header border-bottom">
            <h3 id="sidebarHeader">Nieuwsbrieven Datums</h3>
        </div>


        <ul class="list-unstyled components">

            <li class="active border-bottom">
                @if ($years)
                    @foreach ($years as $year => $newsLetters_year)
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-toggle d-inline-flex align-items-center border-0"
                                data-bs-toggle="collapse" data-bs-target="#newsletterOfYear{{ $year }}"
                                aria-expanded="true" autofocus>
                                {{ $year }}
                                <i class="bi bi-arrow-down text-secondary"></i>
                            </button>
                        </div>

                        <div class="collapse collapsed" id="newsletterOfYear{{ $year }}">
                            <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                @foreach ($newsLetters_year as $newsLetter)
                                    <li>
                                        <a id="articleNav" href="#{{$newsLetter['id']}}" dusk="click_newsletter"
                                            class="border-0 text-decoration-none text-black ">
                                            <p id="navText" class="border-top pt-2">
                                                Nieuwsbrief van {{ date('d-m', strtotime($newsLetter['date'])) }}
                                                <br>
                                                {{ $newsLetter['pdf'] }}
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @endif
            </li>
        </ul>
    </nav>
</div>
