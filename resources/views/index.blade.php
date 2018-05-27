<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Verslo patalpų nuoma</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/bs4.css" rel="stylesheet" type="text/css">
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link href="/css/datatables.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    </head>

    <body>
        <?php
        
        $sidebarCollapsed = ($_COOKIE['sidebarCollapsed'] ?: "false") == "true";
        $offices = \App\Office::all();
        $districts = \App\District::all();

        $mappedDistricts = $districts->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        $office = new \App\Office();
        
        ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Projektas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#filters">
                            <i class="fas fa-filter"></i>
                            Filtrai
                        </a>
                    </li>
                    @guest
                    @else
                    <li class="nav-item">
                        <a id="offices-tab" class="nav-link" data-toggle="tab" href="#offices">
                            <i class="fas fa-building"></i>
                            Ofisai
                        </a>
                    </li>
                    @endguest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-information" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-info"></i>
                            Informacija
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-information">
                            <a class="dropdown-item" href="#">
                                <!--<i class="fas fa-book"></i>-->
                                Apie projektą
                            </a>
                            <a class="dropdown-item" href="#">
                                <!--<i class="fas fa-users"></i>-->
                                Komanda
                            </a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" id="loginNavBtn" href="{{ route('login') }}">Prisijungimas</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="registerNavBtn" href="{{ route('register') }}">Registracija</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <!--<i class="fas fa-sign-out-alt"></i>-->
                                    {{ __('Atsijungti') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main{{ $sidebarCollapsed ? ' class=collapsed' : '' }}>
            <aside class="bg-dark">
                <div class="scrollable tab-content">
                    <?= view('filters', ['districts' => $districts]) ?>
                    <?= view('offices', ['offices' => $offices, 'districts' => $districts]) ?>
                </div>
                
                <!-- collapse button -->
                <button class="btn btn-sm btn-dark collapse-sidebar">
                    {!! $sidebarCollapsed ? '&raquo;' : '&laquo;' !!}
                </button>
            </aside>

            <!-- Google Maps -->
            <div id="map"></div>

        </main>
        
        {!! view('modals', ['office' => $office, 'mappedDistricts' => $mappedDistricts]) !!}

        <script>
            var districts = <?php echo json_encode($districts); ?>;
            var markers = <?php echo json_encode($offices); ?>;
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="/js/js.cookie-2.2.0.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/bs4.js"></script>
        <script src="/js/datatables.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN3UnRVyKmWufkkEB-FDsPDwZgtfBsm6A&callback=initMap"></script>

    </body>
</html>
