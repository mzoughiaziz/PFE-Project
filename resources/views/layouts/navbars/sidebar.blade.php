<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">

            <img src="https://app.easyjur.com/sgr/protecao/logo_easyjur.png" class="" style=" height:'200px';
                width:'200px';" alt="Easyjur">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            {{-- <img src="{{ asset('argon') }}/img/brand/blue.png"> --}}
                            Easyjur
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
            @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-chart-pie-35 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
            @endif
                @if (auth()->user()->role == 2 || auth()->user()->role == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agenda') }}">
                            <i class="ni ni-calendar-grid-58 text-primary"></i> {{ __('Agenda') }}
                        </a>
                    </li>


                @endif


                @if (auth()->user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('associate') }}">
                            <i class="ni ni-badge text-primary"></i> {{ __('Collaborateurs') }}
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role != 3)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('avocat') }}">
                        <i class="ni ni-badge text-primary"></i> {{ __('Avocats') }}
                    </a>
                </li>
            @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('people') }}">
                        <i class="ni ni-single-02 text-primary"></i> {{ __('Clients') }}
                    </a>
                </li>


                @if (auth()->user()->role == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proces') }}">
                            <i class="ni ni-bullet-list-67 text-primary"></i> {{ __('Procés') }}
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('project') }}">
                        <i class="ni ni-briefcase-24 text-primary"></i> {{ __('Projet Consultatifs') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-document" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-document">
                        <i class="ni ni-single-copy-04" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Documents Légales') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-document">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documents') }}">
                                    <i class="ni ni-ungroup" style="color: #f4645f;"></i>
                                    {{ __('Documents') }}
                                </a>
                            </li>
                            @if (auth()->user()->role != 3)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('models') }}">
                                        <i class="ni ni-folder-17" style="color: #f4645f;"></i>
                                        {{ __('Models') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @if (auth()->user()->role != 3)
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-Finances" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-Finances">
                            <i class="ni ni-money-coins" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Finances') }}</span>
                        </a>

                        <div class="collapse show" id="navbar-Finances">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('res_office') }}">
                                        <i class="ni ni-align-left-2" style="color: #f4645f;"></i>
                                        {{ __('Recettes de bureau') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frais_office') }}">
                                        <i class="ni ni-basket" style="color: #f4645f;"></i>
                                        {{ __('Frais de bureau') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endif



            </ul>
            <!-- Divider -->
            <hr class="my-3">


        </div>
    </div>
</nav>
