<?php
/* Smarty version 5.4.5, created on 2026-01-11 12:38:05
  from 'file:Roles.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69638b9d6e5330_29557465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f9086ecf62e66b43bb054a80d8add88c0c9867f' => 
    array (
      0 => 'Roles.tpl',
      1 => 1768131177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69638b9d6e5330_29557465 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/amelia/app/views';
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Role</title>

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
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'welcome'), $_smarty_tpl);?>
">
                        <i class="bi bi-house"></i> Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'roleList'), $_smarty_tpl);?>
">
                        <i class="bi bi-shield-lock"></i> Role
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'userList'), $_smarty_tpl);?>
">
                        <i class="bi bi-people"></i> Użytkownicy
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
raporty">
                        <i class="bi bi-bar-chart"></i> Raporty
                    </a>
                </li>


                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-3" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
">
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

            <?php if ((true && ($_smarty_tpl->hasVariable('roles') && null !== ($_smarty_tpl->getValue('roles') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('roles')) > 0) {?>

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
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('roles'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('r')['rola_id'];?>
</td>

                        <td>
                            <span class="fw-semibold">
                                <?php echo $_smarty_tpl->getValue('r')['nazwa'];?>

                            </span>
                        </td>

                        <td>
                            <?php if ($_smarty_tpl->getValue('r')['status'] == 'A') {?>
                                <span class="badge bg-success">Aktywna</span>
                            <?php } else { ?>
                                <span class="badge bg-danger">Nieaktywna</span>
                            <?php }?>
                        </td>

                        <td><?php echo $_smarty_tpl->getValue('r')['data_utworzenia'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('r')['data_modyfikacji'];?>
</td>

                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>

            </table>

            <?php } else { ?>
                <div class="alert alert-info m-3">
                    Brak ról do wyświetlenia.
                </div>
            <?php }?>

        </div>
    </div>


    <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
        <div class="alert alert-success mt-4">
            <ul class="mb-0">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getInfos(), 'msg');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach2DoElse = false;
?>
                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    <?php }?>

</div>


<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
