<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Role</title>

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
                    <a class="nav-link" href="{url action='welcome'}">
                        <i class="bi bi-house"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{url action='roleList'}">
                        <i class="bi bi-shield-lock"></i> Role
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{url action='userList'}">
                        <i class="bi bi-people"></i> Użytkownicy
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}raporty">
                        <i class="bi bi-bar-chart"></i> Raporty
                    </a>
                </li>


                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-3" href="{url action='logout'}">
                        Wyloguj
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- ================= zawartość ================= -->
<div class="container my-4">

    <!-- ===== tabela ===== -->
    <div class="card">
        <div class="card-body p-0">

            {if isset($roles) && $roles|@count > 0}

            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nazwa roli</th>
                        <th>Status</th>
                        <th>Data utworzenia</th>
                        <th>Data modyfikacji</th>
                    </tr>
                </thead>

                <tbody>
                {foreach $roles as $r}
                    <tr>
                        <td>{$r.rola_id}</td>

                        <td>
                            <span class="fw-semibold">
                                {$r.nazwa}
                            </span>
                        </td>

                        <td>
                            {if $r.status == 'A'}
                                <span class="badge bg-success">Aktywna</span>
                            {else}
                                <span class="badge bg-danger">Nieaktywna</span>
                            {/if}
                        </td>

                        <td>{$r.data_utworzenia}</td>
                        <td>{$r.data_modyfikacji}</td>

                    </tr>
                {/foreach}
                </tbody>

            </table>

            {else}
                <div class="alert alert-info m-3">
                    Brak ról do wyświetlenia.
                </div>
            {/if}

        </div>
    </div>


    {if $msgs->isError()}
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                {foreach $msgs->getErrors() as $msg}
                    <li>{$msg}</li>
                {/foreach}
            </ul>
        </div>
    {/if}

    {if $msgs->isInfo()}
        <div class="alert alert-success mt-4">
            <ul class="mb-0">
                {foreach $msgs->getInfos() as $msg}
                    <li>{$msg}</li>
                {/foreach}
            </ul>
        </div>
    {/if}

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
