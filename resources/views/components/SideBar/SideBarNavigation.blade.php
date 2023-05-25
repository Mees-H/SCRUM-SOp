<div class="px-3 mb-3 pt-3 bg-white card">
<nav id="sidebar">
    <div class="sidebar-header border-bottom">
        <h3 id="sidebarHeader">Artikelen</h3>
    </div>

    <ul class="list-unstyled components mb-0">

        <li class="active border-bottom">
            <h3 id="sidebarHeader" class="pt-2">
                Datums
            </h3>
            @foreach($yearsOfNewsArticles as $year)
            <div class="d-flex justify-content-between">

            <button class="btn btn-toggle d-inline-flex align-items-center border-0" data-bs-toggle="collapse" data-bs-target="#articleOfYear{{$year}}" aria-expanded="true">
                {{$year}}
                <i class="bi bi-arrow-down text-secondary"></i>
            </button>

            </div>

            <div class="collapse collapsed" id="articleOfYear{{$year}}">
            <ul class="btn-toggle-nav list-unstyled fw-normal small">

                    @foreach($articles as $article)
                        <li>
                            <a id="articleNav" href="#{{$article->id}}" class="border-0 text-decoration-none text-black ">
                                <p id="navText" class="border-top pt-2">
                                {{$article->title}}
                                    <br/>
                                    {{date('d-m', strtotime($article->date))}}
                                </p>
                            </a>
                        </li>
                    @endforeach

            </ul>
            </div>
            @endforeach
        </li>
    </ul>
</nav>
</div>
