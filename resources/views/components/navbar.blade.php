<nav class="navbar navbar-expand-lg fixed-top bg_nav">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo_navbar" src="/images/logo/logo-primary.png" alt="">
        </a>
        <button class="navbar-toggler navbar_toggler_focused " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class=" "><i class="bi bi-view-list"></i></span>
        </button>
        <div class="collapse justify-content-center navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                {{-- ! rotta homepage --}}
                <li class="nav-item">
                    <a class="nav-link transition_03 @if (Route::currentRouteName() == 'home') active @endif"
                        aria-current="page" href="{{ route('home') }}">{{ __('navbar.home') }}</a>
                </li>

                {{-- ! rotta annunci --}}
                <li class="nav-item">
                    <a class="nav-link transition_03 @if (Route::currentRouteName() == 'announcement.index') active @endif"
                        href="{{ route('announcement.index') }}">{{ __('navbar.annunci') }}</a>
                </li>

                {{-- ! rotta creazione annunci --}}
                <li class="nav-item">
                    <a class="nav-link transition_03 @if (Route::currentRouteName() == 'announcement.create' || Route::currentRouteName() == 'login') active @endif"
                        href="{{ route('announcement.create') }}">{{ __('navbar.crea') }}</a>
                </li>

                {{-- ! dropdown categorie lg --}}
                <li class="nav-item dropdown-center d-none d-lg-block">
                    <a class="nav-link transition_03 dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('navbar.categorie') }}
                    </a>
                    <ul class="dropdown-menu dropmenu_custom" id="dropmenu_custom">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item d-flex justify-content-between color-P"
                                    href="{{ route('category.index', compact('category')) }}">{{ __('navbar.' . $category->name) }}
                                    <span class="color-P px-3">
                                        {{ $category->announcements->where('is_accepted', true)->count() }}
                                    </span>

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                {{-- ! dropdown categorie md --}}
                

                    <div class="row justify-content-start mb-3 mt-2 mx-2 d-lg-none">
                        <li class="nav-item color-P col_category pb-2 fw-bold">
                            Categorie
                        </li>
                        @foreach ($categories as $category)
                            <div class="col-7 d-flex justify-content-start align-items-center ps-3 py-2 col_category">
                                <a class="dropdown-item d-flex justify-content-between  color-P"
                                    href="{{ route('category.index', compact('category')) }}">

                                    {{ __('navbar.' . $category->name) }}
                                    <span class="color-P">
                                        {{ $category->announcements->where('is_accepted', true)->count() }}
                                    </span>

                                </a>
                            </div>
                        @endforeach
                    </div>
            

                {{-- ? Sezione Navbar schermi piccoli --}}
                <div class="d-lg-none">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="btn-group dropend">
                                <button class="btn btn_standard dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-translate"></i>
                                </button>
                                <ul class="dropdown-menu dropdown_lang py-0">
                                    <li class="dropdown-item py-0">
                                        <x-_locale class="w-25" lang="es" />

                                        <x-_locale class="w-25" lang="it" />

                                        <x-_locale class="w-25" lang="en" />
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item w-100 my-3">
                            <form action="{{ route('announcement.search') }}" method="GET" class="d-flex"
                                role="search">
                                <button class="btn me-2 btn-outline-success btn_standard"
                                    type="submit">{{ __('navbar.search') }}</button>
                                <input name="searched" class="form-control me-2 form_input_focused" type="search"
                                    placeholder="es. Lorem, Articoli, T-shirt" aria-label="Search">
                            </form>
                        </li>
                    </ul>

                    {{-- ! accesso utenti guest --}}
                    @guest
                        <div class="d-flex my-3">
                            <li class="nav-item me-5 ">
                                <a class="color-P fw-bold dropdown-item"
                                    href="{{ route('register') }}">{{ __('navbar.registrati') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="color-P dropdown-item" href="{{ route('login') }}">{{ __('navbar.accedi') }}</a>
                            </li>
                        </div>
                    @endguest

                    {{-- ! accesso utenti auth --}}
                    @auth
                        <div class="d-flex justify-content-between my-2">
                            <li class="nav-item ">
                                @if (Auth::user() && Auth::user()->is_revisor)
                                    <a href="{{ route('revisor.home') }}"
                                        class="dropdown-item position-relative color-P fw-bold">
                                        <i class="bi bi-person-circle pe-2 fs-6 color-P"></i>Revisor
                                    </a>
                                @endif
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item fs-6 fw-bold color-P pe-3" type="submit"><i
                                            class="bi bi-box-arrow-left pe-2 fs-6 text-danger"></i>Logout
                                    </button>
                                </form>
                            </li>
                            </d>
                        @endauth
                    </div>


                </div>

            </ul>
        </div>
    </div>

    <div class="d-none d-lg-block">
        <div>
            <ul class="navbar-nav justify-content-end d-flex">
                <li class="nav-item align-items-center d-flex my-md-0">
                    <div class="btn-group dropstart">
                        <button class="btn btn_standard dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-translate"></i>
                        </button>
                        <ul class="dropdown-menu p-0 dropdown_lang mx-0">
                            <li class="dropdown-item py-0 d-flex justify-content-evenly px-0 ">
                                <x-_locale class="w-25" lang="es" />

                                <x-_locale class="w-25" lang="it" />

                                <x-_locale class="w-25" lang="en" />
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item align-items-center d-flex ps-lg-2 my-2 my-md-0">
                    <button type="button" class="btn btn_standard" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-search"></i>
                    </button>

                </li>
                <li class="nav-item dropdown end-0">
                    <a class="nav-link dropdown-toggle dropdown-toggle2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <button class="btn transition_03"><i class="bi fs-4 bi-person-circle color-P"></i></button>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                            <li><a class=" dropdown-item"
                                    href="{{ route('register') }}">{{ __('navbar.registrati') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('navbar.accedi') }}</a></li>
                        @endguest
                        @auth
                            <li class="nav-item  ">
                                @if (Auth::user() && Auth::user()->is_revisor)
                                    <a href="{{ route('revisor.home') }}" class="dropdown-item position-relative">
                                        Revisor
                                        <span class="mx-1">
                                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                                        </span>
                                    </a>
                                @endif
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item bg-light " type="submit">Logout <i
                                            class="bi bi-box-arrow-right px-2"></i></button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ! modale per il search --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('navbar.searcharticles') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('announcement.search') }}" method="GET" class="d-flex" role="search">
                    <input name="searched" class="form-control me-2 form_input_focused" type="search"
                        placeholder="es. Lorem, Articoli, T-shirt" aria-label="Search">
                    <button class="btn btn-outline-success btn_standard"
                        type="submit">{{ __('navbar.search') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
