<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel zarządzania lodziarnią</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>

<body class="bg-light">

<!-- ================= panel nawigacyjny ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">

        <span class="navbar-brand fw-bold">🍦 Frosty Manager</span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto gap-2">

                <li class="nav-item">
                    <a class="nav-link active" href="{$conf->action_url}welcome">
                        <i class="bi bi-house"></i> Home
                    </a>
                </li>

                {if in_array('admin', $roles)}
                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}roleList">
                        <i class="bi bi-shield-lock"></i> Role
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}userList">
                        <i class="bi bi-people"></i> Użytkownicy
                    </a>
                </li>
                {/if}

                {if in_array('sprzedawca', $roles) || in_array('manager', $roles)}
                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}orders">
                        <i class="bi bi-cart"></i> Zamówienia
                    </a>
                </li>
                {/if}

                {if in_array('produkcja', $roles) || in_array('manager', $roles)}
                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}inventory">
                        <i class="bi bi-box"></i> Magazyn
                    </a>
                </li>
                {/if}

                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}raporty">
                        <i class="bi bi-bar-chart"></i> Raporty
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-3" href="{$conf->action_url}logout">
                        Wyloguj
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- ================= zawartość ================= -->
<div class="container my-4">

    <!-- ===== panel powitalny ===== -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card p-4">

                {if in_array('admin', $roles)}
                    <h1>Witaj w panelu administracyjnym</h1>
                    <p class="text-muted mb-0">Zarządzanie użytkownikami i rolami</p>

                {elseif in_array('manager', $roles)}
                    <h1>Witaj w panelu zarządzania</h1>
                    <p class="text-muted mb-0">Nadzór nad sprzedażą i magazynem</p>

                {elseif in_array('produkcja', $roles)}
                    <h1>Witaj w panelu zarządzania produkcją</h1>
                    <p class="text-muted mb-0">Kontrola stanów magazynowych</p>

                {else}
                    <h1>Witaj w panelu sprzedaży</h1>
                    <p class="text-muted mb-0">Obsługa zamówień klientów</p>
                {/if}

            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100">
                <img src="{$conf->app_url}/images/lody2.png"
                     class="img-fluid rounded"
                     alt="Lody">
            </div>
        </div>
    </div>

    <!-- ===== info o uytkowniku i panele dedykowane dla kazdej roli ===== -->
    <div class="row mb-4">

        <!-- uzytkownik -->
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted">
                        <i class="bi bi-person"></i> Zalogowany użytkownik
                    </h6>
                    <h5>{$user.imie} {$user.nazwisko}</h5>
                    {foreach $roles as $r}
                        <span class="badge bg-primary me-1">{$r}</span>
                    {/foreach}
                </div>
            </div>
        </div>


        {if in_array('admin', $roles)}
        <div class="col-md-3">
                <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-people"></i> Użytkownicy w systemie</h6>
                    <div class="mt-2">
                        <span class="badge bg-success">Aktywnych: {$users_active}</span>
                        <span class="badge bg-danger ms-2">Nieaktywnych: {$users_inactive}</span>
                    </div>
                </div>
            </div>
        </div>
        {/if}


        {if in_array('sprzedawca', $roles) || in_array('manager', $roles)}
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-cart"></i> Zamówienia</h6>
                    <span class="badge bg-warning text-dark me-1">{$orders_open} otwartych</span>
                    <span class="badge bg-success">{$orders_done} zrealizowanych</span>
                </div>
            </div>
        </div>
        {/if}

        {if in_array('produkcja', $roles) || in_array('manager', $roles)}
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-box"></i> Magazyn</h6>
                    <span class="badge bg-warning text-dark me-1">{$low_stock} - niski stan magazynowy</span>
                    <span class="badge bg-success">{$high_stock} - wysoki stan magazynowy </span>
                </div>
            </div>
        </div>
        {/if}

        {if in_array('sprzedawca', $roles) || in_array('manager', $roles)}
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-bar-chart"></i> Sprzedaż (dziś)</h6>
                    <h4>{$sales_today} zł</h4>
                </div>
            </div>
        </div>
        {/if}

    </div>

    <!-- ===== skróty ===== -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3">Skróty</h4>
                    <div class="row g-3">

                        {if in_array('admin', $roles)}
                        <div class="col-md-6">
                            <a href="{$conf->action_url}editUser" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-person-plus"></i> Dodaj użytkownika</h6>
                                </div>
                            </a>
                        </div>
                        {/if}

                        {if in_array('sprzedawca', $roles)}
                        <div class="col-md-6">
                            <a href="{$conf->action_url}orderAdd" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-cart-plus"></i> Dodaj zamówienie</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{$conf->action_url}raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Raport dzienny</h6>
                                </div>
                            </a>
                        </div>
                        {/if}

                        {if in_array('produkcja', $roles)}
                        <div class="col-md-6">
                            <a href="{$conf->action_url}addInventory" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-box"></i> Dodaj pozycję magazynową</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{$conf->action_url}raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Raport magazynowy</h6>
                                </div>
                            </a>
                        </div>
                        {/if}

                        {if in_array('manager', $roles)}
                        <div class="col-md-6">
                            <a href="{$conf->action_url}orderAdd" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-cart-plus"></i> Dodaj zamówienie</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="{$conf->action_url}raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Generuj raport</h6>
                                </div>
                            </a>
                        </div>
                        {/if}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
