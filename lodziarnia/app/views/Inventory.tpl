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

        {if in_array('produkcja', $roles)}
          <a href="{$conf->action_url}addInventory"
              class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Dodaj nowy smak
          </a>
        {/if}
    </div>


    {if $msgs->isMessage()}
        {foreach $msgs->getMessages() as $msg}
            <div class="alert alert-{if $msg->type==2}danger{else}success{/if}">
                {$msg->text}
            </div>
        {/foreach}
    {/if}

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form id="inventorySearchForm" method="get" action="{$conf->action_url}inventory" class="row g-2 align-items-center">
                <input type="hidden" name="ajax" value="0">
                <div class="col-sm-5">
                    <label class="form-label visually-hidden" for="searchQuery">Szukaj</label>
                    <input id="searchQuery" name="q" type="search" class="form-control" placeholder="Szukaj po nazwie smaku" value="{$search|escape:'html'}">
                </div>
                <div class="col-sm-3">
                    <label class="form-label visually-hidden" for="statusFilter">Status</label>
                    <select id="statusFilter" name="status" class="form-select">
                        <option value="">Wszystkie statusy</option>
                        <option value="A"{if $status == 'A'} selected{/if}>Aktywne</option>
                        <option value="N"{if $status == 'N'} selected{/if}>Wycofane</option>
                    </select>
                </div>
                <div class="col-sm-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Szukaj
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="inventoryContent">
        {include file='InventoryTable.tpl'}
    </div>

</div>

<script>
    (function() {
        const form = document.getElementById('inventorySearchForm');
        const content = document.getElementById('inventoryContent');

        function buildUrl(params) {
            const url = new URL(form.action, window.location.href);
            Object.keys(params).forEach(key => {
                if (params[key] !== null && params[key] !== undefined && params[key] !== '') {
                    url.searchParams.set(key, params[key]);
                } else {
                    url.searchParams.delete(key);
                }
            });
            return url.toString();
        }

        function loadInventory(url) {
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Błąd sieci');
                    }
                    return response.text();
                })
                .then(html => {
                    content.innerHTML = html;
                })
                .catch(error => {
                    console.error(error);
                });
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            const params = {
                ajax: '1',
                q: formData.get('q') || '',
                status: formData.get('status') || '',
                page: 1
            };
            const url = buildUrl(params);
            loadInventory(url);
            history.replaceState(null, '', buildUrl({
                q: params.q,
                status: params.status,
                page: params.page
            }));
        });

        content.addEventListener('click', function(event) {
            const target = event.target.closest('.page-link-js');
            if (!target) {
                return;
            }
            event.preventDefault();
            loadInventory(target.href);
            const url = new URL(target.href, window.location.href);
            url.searchParams.delete('ajax');
            history.replaceState(null, '', url.toString());
        });
    })();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
