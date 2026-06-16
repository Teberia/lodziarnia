<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>Nazwa smaku</th>
                <th>Dostępna ilość</th>
                <th>Status</th>
                {if in_array('produkcja', $roles)}<th class="text-end">Akcje</th>{/if}
            </tr>
            </thead>

            <tbody>
            {if $items|@count > 0}
                {foreach $items as $i}
                    <tr>
                        <td class="fw-semibold">{$i.nazwa}</td>
                        <td>
                            {if $i.dostepna_ilosc < 5}
                                <span class="badge bg-danger">{$i.dostepna_ilosc} – niski stan</span>
                            {else}
                                <span class="badge bg-success">{$i.dostepna_ilosc}</span>
                            {/if}
                        </td>
                        <td>
                            {if $i.status == 'A'}
                                <span class="badge bg-success">Aktywny</span>
                            {else}
                                <span class="badge bg-secondary">Wycofany</span>
                            {/if}
                        </td>
                        <td class="text-end">
                            {if in_array('produkcja', $roles)}
                            <a href="{$conf->action_url}editInventory?&id={$i.smak_id}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {if $i.status == 'A'}
                                <a href="{$conf->action_url}deactivateInventory?id={$i.smak_id}" class="btn btn-sm btn-outline-warning" title="Dezaktywuj">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            {else}
                                <a href="{$conf->action_url}activateInventory?id={$i.smak_id}" class="btn btn-sm btn-outline-success" title="Aktywuj">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            {/if}

                            {if $i.status == 'N'}
                                <a href="{$conf->action_url}deleteInventory?&id={$i.smak_id}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Czy na pewno usunąć smak?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            {/if}
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">Brak smaków w magazynie</td>
                </tr>
            {/if}
            </tbody>
        </table>

    </div>

    <div class="card-footer bg-white border-top">
        <div class="row align-items-center">
            <div class="col-sm">
                <small class="text-muted">
                    Wyświetlono {$pageFrom}–{$pageTo} z {$totalRows} wyników
                </small>
            </div>
            <div class="col-sm-auto">
                {if $pages > 1}
                    <nav aria-label="Paginacja">
                        <ul class="pagination mb-0">
                            <li class="page-item {if $page == 1}disabled{/if}">
                                <a class="page-link page-link-js" href="{$conf->action_url}inventory?ajax=1&page={$page-1}&q={$search|escape:'url'}&status={$status|escape:'url'}">Poprzednia</a>
                            </li>
                            {foreach $pageNumbers as $pageNumber}
                                <li class="page-item {if $page == $pageNumber}active{/if}">
                                    <a class="page-link page-link-js" href="{$conf->action_url}inventory?ajax=1&page={$pageNumber}&q={$search|escape:'url'}&status={$status|escape:'url'}">{$pageNumber}</a>
                                </li>
                            {/foreach}
                            <li class="page-item {if $page == $pages}disabled{/if}">
                                <a class="page-link page-link-js" href="{$conf->action_url}inventory?ajax=1&page={$page+1}&q={$search|escape:'url'}&status={$status|escape:'url'}">Następna</a>
                            </li>
                        </ul>
                    </nav>
                {/if}
            </div>
        </div>
    </div>
</div>
