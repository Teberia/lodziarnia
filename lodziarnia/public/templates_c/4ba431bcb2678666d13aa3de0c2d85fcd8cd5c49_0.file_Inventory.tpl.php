<?php
/* Smarty version 5.4.5, created on 2026-05-10 13:54:10
  from 'file:Inventory.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a008e0292f285_49687432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ba431bcb2678666d13aa3de0c2d85fcd8cd5c49' => 
    array (
      0 => 'Inventory.tpl',
      1 => 1778421213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:InventoryTable.tpl' => 1,
  ),
))) {
function content_6a008e0292f285_49687432 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/views';
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Magazyn – Smaki</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/style.css">
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
                    <a class="nav-link active" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
welcome">
                        <i class="bi bi-house"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory">
                        <i class="bi bi-box"></i> Magazyn
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
raporty">
                        <i class="bi bi-bar-chart"></i> Raporty
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-3" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout">
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

          <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addInventory"
              class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Dodaj nowy smak
        </a>
    </div>


    <?php if ($_smarty_tpl->getValue('msgs')->isMessage()) {?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <div class="alert alert-<?php if ($_smarty_tpl->getValue('msg')->type == 3) {?>danger<?php } else { ?>success<?php }?>">
                <?php echo $_smarty_tpl->getValue('msg')->text;?>

            </div>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php }?>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form id="inventorySearchForm" method="get" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory" class="row g-2 align-items-center">
                <input type="hidden" name="ajax" value="0">
                <div class="col-sm-5">
                    <label class="form-label visually-hidden" for="searchQuery">Szukaj</label>
                    <input id="searchQuery" name="q" type="search" class="form-control" placeholder="Szukaj po nazwie smaku" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('search'), ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                <div class="col-sm-3">
                    <label class="form-label visually-hidden" for="statusFilter">Status</label>
                    <select id="statusFilter" name="status" class="form-select">
                        <option value="">Wszystkie statusy</option>
                        <option value="A"<?php if ($_smarty_tpl->getValue('status') == 'A') {?> selected<?php }?>>Aktywne</option>
                        <option value="N"<?php if ($_smarty_tpl->getValue('status') == 'N') {?> selected<?php }?>>Wycofane</option>
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
        <?php $_smarty_tpl->renderSubTemplate('file:InventoryTable.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

</div>

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
