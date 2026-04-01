<?php
/* Smarty version 5.4.5, created on 2026-01-11 12:41:52
  from 'file:Inventory.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69638c80815788_32700883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3776f4602d191a5b1ff23a5e0f01f8160e810966' => 
    array (
      0 => 'Inventory.tpl',
      1 => 1768131258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69638c80815788_32700883 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/amelia/app/views';
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
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('items')) > 0) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('items'), 'i');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('i')->value) {
$foreach1DoElse = false;
?>
                        <tr>

                            <td class="fw-semibold"><?php echo $_smarty_tpl->getValue('i')['nazwa'];?>
</td>

                            <td>
                                <?php if ($_smarty_tpl->getValue('i')['dostepna_ilosc'] < 5) {?>
                                    <span class="badge bg-danger">
                                        <?php echo $_smarty_tpl->getValue('i')['dostepna_ilosc'];?>
 – niski stan
                                    </span>
                                <?php } else { ?>
                                    <span class="badge bg-success">
                                        <?php echo $_smarty_tpl->getValue('i')['dostepna_ilosc'];?>

                                    </span>
                                <?php }?>
                            </td>

                            <td>
                                <?php if ($_smarty_tpl->getValue('i')['status'] == 'A') {?>
                                    <span class="badge bg-success"> Aktywny </span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary"> Wycofany </span>
                                <?php }?>
                            </td>


                            <td class="text-end">
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editInventory?&id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                            <?php if ($_smarty_tpl->getValue('i')['status'] == 'A') {?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deactivateInventory?id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
"
                                   class="btn btn-sm btn-outline-warning"title="Dezaktywuj">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
activateInventory?id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
"
                                   class="btn btn-sm btn-outline-success"title="Aktywuj">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            <?php }?>
                            <?php if ($_smarty_tpl->getValue('i')['status'] == 'N') {?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteInventory?&id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Czy na pewno usunąć smak?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            <?php }?>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Brak smaków w magazynie
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
