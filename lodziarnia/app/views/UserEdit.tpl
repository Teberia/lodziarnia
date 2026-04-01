<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Dodaj użytkownika</title>

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
    <div class="mb-3">
        <h1>Dodaj nowego użytkownika</h1>
        <p class="text-muted">Uzupełnij dane użytkownika i przypisz rolę</p>
    </div>

    <!-- ===== formularz ===== -->
    <div class="card">
        <div class="card-body">

            <form action="{$conf->action_url}saveUser" method="post">

            {if isset($user.uzytkownik_id)}
    <input type="hidden" name="uzytkownik_id" value="{$user.uzytkownik_id}">
{/if}

                <div class="row g-3">

                    <!-- IMIĘ -->
                    <div class="col-md-6">
                        <label class="form-label">Imię</label>
                        <input type="text"
                               name="imie"
                               value="{$user.imie|default:''}"
                               class="form-control"
                               required>
                    </div>

                    <!-- NAZWISKO -->
                    <div class="col-md-6">
                        <label class="form-label">Nazwisko</label>
                        <input type="text"
                               name="nazwisko"
                               value="{$user.nazwisko|default:''}"
                               class="form-control"
                               required>
                    </div>

                    <!-- LOGIN -->
                    <div class="col-md-6">
                        <label class="form-label">Login</label>
                        <input type="text"
                               name="login"
                               value="{$user.login|default:''}"
                               class="form-control"
                               required>
                    </div>

                    <!-- HASŁO -->
                    <div class="col-md-6">
                        <label class="form-label">Hasło</label>
                        <input type="password"
                               name="haslo"
                               class="form-control">
                    </div>

                    <!-- ROLA -->
                    <div class="col-md-6">
                        <label class="form-label">Rola</label>
                        <select name="rola" class="form-select" required>
                            <option value="">-- wybierz rolę --</option>
                            <option value="admin">Administrator</option>
                            <option value="sprzedawca">Sprzedawca</option>
                            <option value="produkcja">Produkcja</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="active"
                                   value="1"
                                   checked>
                            <label class="form-check-label">
                                Aktywny
                            </label>
                        </div>
                    </div>

                </div>

                <!-- ===== PRZYCISKI ===== -->
                <div class="mt-4 d-flex justify-content-between">

                    <a href="{$conf->action_url}userList"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Powrót
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Zapisz użytkownika
                    </button>

                </div>

            </form>

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
