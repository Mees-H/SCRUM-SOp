<head>
    <link rel="stylesheet" href="{{asset('css/News.css')}}"/>
    <title>NavigationSideBar</title>
</head>

<div class="wrapper flex-shrink-0 p-3 bg-white card shadow">
<nav id="sidebar">
    <div class="sidebar-header border-bottom">
        <h3 id="sidebarHeader">Artikelen</h3>
    </div>
    <ul class="list-unstyled components">
        @foreach($articles as $article)
        <li class="active">
            <a class="btn" href="#{{$article->date}}id">
                <h5>{{$article->title}}</h5>
                {{$article->date}}
            </a>
        </li>

        @endforeach
    </ul>
</nav>
</div>
