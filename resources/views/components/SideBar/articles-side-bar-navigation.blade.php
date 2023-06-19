<head>
    <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
    <title>NavigationSideBar</title>
</head>

<div class="wrapper p-3 bg-white card">
    <nav id="sidebar">
        <div class="sidebar-header border-bottom">
            <h3 id="sidebarHeader">Artikelen Datums</h3>
        </div>


        <ul class="list-unstyled components">

            <li class="active border-bottom">
                @if($years)
                    @foreach($years as $year => $articles_year)
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-toggle d-inline-flex align-items-center border-0" data-bs-toggle="collapse" data-bs-target="#articleOfYear{{$year}}" aria-expanded="true">
                                {{$year}}
                                <i class="bi bi-arrow-down text-secondary"></i>
                            </button>
                        </div>

                        <div class="collapse collapsed" id="articleOfYear{{$year}}">
                            <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                @foreach($articles_year as $article)
                                    <li>
                                        <a id="articleNav" href="#{{$article['id']}}" dusk="click_article" class="border-0 text-decoration-none text-black ">
                                            <p id="navText" class="border-top pt-2">
                                                {{$article['title']}}
                                                <br/>
                                                {{date('d-m', strtotime($article['date']))}}
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
