

<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Użytkownicy</title>

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

    <!-- ===== nagłówek ===== -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Użytkownicy</h1>

        <a href="{url action='editUser'}"
           class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Dodaj nowego użytkownikaa
        </a>
    </div>

    <!-- ===== tabela ===== -->
    <div class="card">
        <div class="card-body p-0">

            {if isset($users) && $users|@count > 0}

            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Login</th>
                        <th>Rola</th>
                        <th>Status</th>
                        <th>Data dodania</th>
                        <th>Data modyfikacji</th>
                        <th class="text-end">Akcje</th>
                    </tr>
                </thead>

                <tbody>
                    {foreach $users as $u}
                    <tr>

                        <td>{$u.imie}</td>
                        <td>{$u.nazwisko}</td>
                        <td>{$u.login}</td>

                        <td>
                            <span class="badge bg-secondary">
                                {$u.role}
                            </span>
                        </td>

                        <td>
                            {if $u.status_konta == 'A'}
                                <span class="badge bg-success">Aktywny</span>
                            {else}
                                <span class="badge bg-danger">Nieaktywny</span>
                            {/if}
                        </td>

                        <td>{$u.data_utworzenia}</td>
                        <td>{$u.data_modyfikacji}</td>

                        <td class="text-end">
                            
                            <a href="{$conf->action_url}editUser?&id={$u.uzytkownik_id}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {if $u.status_konta== 'A'}
                                <a href="{$conf->action_url}deactivateUser?&id={$u.uzytkownik_id}"
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            {else}
                                <a href="{$conf->action_url}activateUser?&id={$u.uzytkownik_id}"
                                   class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            {/if}
                            
                            <a href="{$conf->action_url}deleteUser?&id={$u.uzytkownik_id}"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Czy na pewno chcesz usunąć użytkownika?');">
                                <i class="bi bi-trash"></i>
                            </a>

                        </td>

                    </tr>
                    {/foreach}
                </tbody>
            </table>

            {else}
                <div class="alert alert-info m-3">
                    Brak użytkowników do wyświetlenia.
                </div>
            {/if}

        </div>
    </div>

    <!-- ===== komuniaty ===== -->
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

