<header class="bg-light">
    <div class="container d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light  fw-bold">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('pie-chart.svg') }}" height="40px"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item px-2"><a class="nav-link" href="#rankings">Rankings</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="#dicas">Dicas</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="#fiis">FIIs</a></li>
                    <li class="nav-item px-2"><a class="nav-link" href="{{ route('carteira.index') }}"><i class="fa-solid fa-wallet"></i> Carteira</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
