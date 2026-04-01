<?php
/* Smarty version 5.4.5, created on 2026-04-01 21:22:24
  from 'file:Welcome.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69cd8c90300355_74228446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91f3f8ecbeabef86f8e95434827b7b4a2334967a' => 
    array (
      0 => 'Welcome.tpl',
      1 => 1768131098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69cd8c90300355_74228446 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/views';
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel zarządzania lodziarnią</title>

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

                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('admin',$_smarty_tpl->getValue('roles'))) {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
roleList">
                        <i class="bi bi-shield-lock"></i> Role
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList">
                        <i class="bi bi-people"></i> Użytkownicy
                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('sprzedawca',$_smarty_tpl->getValue('roles')) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orders">
                        <i class="bi bi-cart"></i> Zamówienia
                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('produkcja',$_smarty_tpl->getValue('roles')) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory">
                        <i class="bi bi-box"></i> Magazyn
                    </a>
                </li>
                <?php }?>

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

<!-- ================= zawartość ================= -->
<div class="container my-4">

    <!-- ===== panel powitalny ===== -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card p-4">

                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('admin',$_smarty_tpl->getValue('roles'))) {?>
                    <h1>Witaj w panelu administracyjnym</h1>
                    <p class="text-muted mb-0">Zarządzanie użytkownikami i rolami</p>

                <?php } elseif ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
                    <h1>Witaj w panelu zarządzania</h1>
                    <p class="text-muted mb-0">Nadzór nad sprzedażą i magazynem</p>

                <?php } elseif ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('produkcja',$_smarty_tpl->getValue('roles'))) {?>
                    <h1>Witaj w panelu zarządzania produkcją</h1>
                    <p class="text-muted mb-0">Kontrola stanów magazynowych</p>

                <?php } else { ?>
                    <h1>Witaj w panelu sprzedaży</h1>
                    <p class="text-muted mb-0">Obsługa zamówień klientów</p>
                <?php }?>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100">
                <img src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/images/lody2.png"
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
                    <h5><?php echo $_smarty_tpl->getValue('user')['imie'];?>
 <?php echo $_smarty_tpl->getValue('user')['nazwisko'];?>
</h5>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
                        <span class="badge bg-primary me-1"><?php echo $_smarty_tpl->getValue('r');?>
</span>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>


        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('admin',$_smarty_tpl->getValue('roles'))) {?>
        <div class="col-md-3">
                <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-people"></i> Użytkownicy w systemie</h6>
                    <div class="mt-2">
                        <span class="badge bg-success">Aktywnych: <?php echo $_smarty_tpl->getValue('users_active');?>
</span>
                        <span class="badge bg-danger ms-2">Nieaktywnych: <?php echo $_smarty_tpl->getValue('users_inactive');?>
</span>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>


        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('sprzedawca',$_smarty_tpl->getValue('roles')) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-cart"></i> Zamówienia</h6>
                    <span class="badge bg-warning text-dark me-1"><?php echo $_smarty_tpl->getValue('orders_open');?>
 otwartych</span>
                    <span class="badge bg-success"><?php echo $_smarty_tpl->getValue('orders_done');?>
 zrealizowanych</span>
                </div>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('produkcja',$_smarty_tpl->getValue('roles')) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-box"></i> Magazyn</h6>
                    <span class="badge bg-warning text-dark me-1"><?php echo $_smarty_tpl->getValue('low_stock');?>
 - niski stan magazynowy</span>
                    <span class="badge bg-success"><?php echo $_smarty_tpl->getValue('high_stock');?>
 - wysoki stan magazynowy </span>
                </div>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('sprzedawca',$_smarty_tpl->getValue('roles')) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-bar-chart"></i> Sprzedaż (dziś)</h6>
                    <h4><?php echo $_smarty_tpl->getValue('sales_today');?>
 zł</h4>
                </div>
            </div>
        </div>
        <?php }?>

    </div>

    <!-- ===== skróty ===== -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3">Skróty</h4>
                    <div class="row g-3">

                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('admin',$_smarty_tpl->getValue('roles'))) {?>
                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editUser" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-person-plus"></i> Dodaj użytkownika</h6>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('sprzedawca',$_smarty_tpl->getValue('roles'))) {?>
                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderAdd" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-cart-plus"></i> Dodaj zamówienie</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Raport dzienny</h6>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('produkcja',$_smarty_tpl->getValue('roles'))) {?>
                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addInventory" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-box"></i> Dodaj pozycję magazynową</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Raport magazynowy</h6>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                        <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('manager',$_smarty_tpl->getValue('roles'))) {?>
                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
orderAdd" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-cart-plus"></i> Dodaj zamówienie</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
raporty" class="card border-primary text-decoration-none">
                                <div class="card-body">
                                    <h6><i class="bi bi-graph-up"></i> Generuj raport</h6>
                                </div>
                            </a>
                        </div>
                        <?php }?>

                    </div>
                </div>
            </div>
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
