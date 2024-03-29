<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Meniu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            @if(!Auth::guest())
                @hasrole("admin")
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Customer') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('management.index') }}">{{ __('Hotel') }}</a>
                </li>

                @endhasrole
            @endif
            <li class="nav-item">

                <a class="nav-link" href="{{ route('hotels.index') }}">{{ __('Reservation') }}</a>
            </li>
            @auth
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('users.res', Auth::id())}}">{{ __('My Reservation') }}</a>
                </li>
            @endauth
        </ul>


    </div>
</nav>
