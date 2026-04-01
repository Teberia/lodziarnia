<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Magazyn – Smaki</title>

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

                <li class="nav-item">
                    <a class="nav-link" href="{$conf->action_url}inventory">
                        <i class="bi bi-box"></i> Magazyn
                    </a>
                </li>

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

<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-box"></i> Magazyn </h2>

          <a href="{$conf->action_url}addInventory"
              class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Dodaj nowy smak
        </a>
    </div>


    {if $msgs->isMessage()}
        {foreach $msgs->getMessages() as $msg}
            <div class="alert alert-{if $msg->type==3}danger{else}success{/if}">
                {$msg->text}
            </div>
        {/foreach}
    {/if}

    <!-- ===== tabela ===== -->
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>Nazwa smaku</th>
                    <th>Dostępna ilość</th>
                    <th>Status</th>
                    <th class="text-end">Akcje</th>
                </tr>
                </thead>

                <tbody>
                {if $items|@count > 0}
                    {foreach $items as $i}
                        <tr>

                            <td class="fw-semibold">{$i.nazwa}</td>

                            <td>
                                {if $i.dostepna_ilosc < 5}
                                    <span class="badge bg-danger">
                                        {$i.dostepna_ilosc} – niski stan
                                    </span>
                                {else}
                                    <span class="badge bg-success">
                                        {$i.dostepna_ilosc}
                                    </span>
                                {/if}
                            </td>

                            <td>
                                {if $i.status == 'A'}
                                    <span class="badge bg-success"> Aktywny </span>
                                {else}
                                    <span class="badge bg-secondary"> Wycofany </span>
                                {/if}
                            </td>


                            <td class="text-end">
                                <a href="{$conf->action_url}editInventory?&id={$i.smak_id}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                            {if $i.status == 'A'}
                                <a href="{$conf->action_url}deactivateInventory?id={$i.smak_id}"
                                   class="btn btn-sm btn-outline-warning"title="Dezaktywuj">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            {else}
                                <a href="{$conf->action_url}activateInventory?id={$i.smak_id}"
                                   class="btn btn-sm btn-outline-success"title="Aktywuj">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            {/if}
                            {if $i.status == 'N'}
                                <a href="{$conf->action_url}deleteInventory?&id={$i.smak_id}"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Czy na pewno usunąć smak?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            {/if}
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Brak smaków w magazynie
                        </td>
                    </tr>
                {/if}
                </tbody>
            </table>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
