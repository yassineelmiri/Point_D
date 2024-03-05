@once
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('homepage') }}">home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('homepage') }}">Accueil</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profiles.index') }}">Les Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publication.index') }}">Mes Publication</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting.index') }}">Mes informations</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.logout') }}">Déconnection</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.show') }}">Se connecter</a>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>
@endonce
