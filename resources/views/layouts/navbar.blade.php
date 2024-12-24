<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">Início</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="{{ route('doctor.index') }}"
                            >
                                Médicos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="{{ route('specialty.index') }}"
                            >
                                Especialidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="{{ route('available_time.index') }}"
                            >
                                Horários disponíveis
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="#"
                            >
                                Minhas Consultas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="{{ route('specialty.list') }}"
                            >
                                Especialidades
                            </a>
                        </li>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a
                            class="nav-link"
                            aria-current="page"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            Sair
                        </a>
                    </form>
                @endauth
                @guest
                    <li class="nav-item">
                        <a
                        class="nav-link"
                        aria-current="page"
                        href="{{ route('specialty.list') }}"
                        >
                            Especialidades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            aria-current="page"
                            href="{{ route('login') }}"
                        >
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Cadastre-se
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
