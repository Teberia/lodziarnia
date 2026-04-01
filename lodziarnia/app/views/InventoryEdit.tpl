<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>{if $item}Edytuj smak{else}Dodaj smak{/if}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h3 class="mb-4">
                        <i class="bi bi-box"></i>
                        {if $item}Edytuj smak{else}Dodaj nowy smak{/if}
                    </h3>

                    <form method="post" action="{$conf->action_url}saveInventory">

                        {if $item}
                            <input type="hidden" name="id" value="{$item.smak_id}">
                        {/if}

                        <div class="mb-3">
                            <label class="form-label">Nazwa smaku</label>
                            <input type="text"
                                   name="nazwa"
                                   class="form-control"
                                   value="{$item.nazwa|default:''}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Dostępna ilość</label>
                            <input type="number"
                                   step="0.1"
                                   name="dostepna_ilosc"
                                   class="form-control"
                                   value="{$item.dostepna_ilosc|default:0}">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{$conf->action_url}inventory"
                               class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Powrót
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Zapisz
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
