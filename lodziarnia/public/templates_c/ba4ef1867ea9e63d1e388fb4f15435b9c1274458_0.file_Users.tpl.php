<?php
/* Smarty version 5.4.5, created on 2026-04-01 21:22:41
  from 'file:Users.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69cd8ca1c13a79_72338917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba4ef1867ea9e63d1e388fb4f15435b9c1274458' => 
    array (
      0 => 'Users.tpl',
      1 => 1768131136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69cd8ca1c13a79_72338917 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/views';
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Użytkownicy</title>

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

    <!-- ===== nagłówek ===== -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Użytkownicy</h1>

        <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'editUser'), $_smarty_tpl);?>
"
           class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Dodaj nowego użytkownika
        </a>
    </div>

    <!-- ===== tabela ===== -->
    <div class="card">
        <div class="card-body p-0">

            <?php if ((true && ($_smarty_tpl->hasVariable('users') && null !== ($_smarty_tpl->getValue('users') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('users')) > 0) {?>

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
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('users'), 'u');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('u')->value) {
$foreach0DoElse = false;
?>
                    <tr>

                        <td><?php echo $_smarty_tpl->getValue('u')['imie'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['nazwisko'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['login'];?>
</td>

                        <td>
                            <span class="badge bg-secondary">
                                <?php echo $_smarty_tpl->getValue('u')['role'];?>

                            </span>
                        </td>

                        <td>
                            <?php if ($_smarty_tpl->getValue('u')['status_konta'] == 'A') {?>
                                <span class="badge bg-success">Aktywny</span>
                            <?php } else { ?>
                                <span class="badge bg-danger">Nieaktywny</span>
                            <?php }?>
                        </td>

                        <td><?php echo $_smarty_tpl->getValue('u')['data_utworzenia'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('u')['data_modyfikacji'];?>
</td>

                        <td class="text-end">
                            
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editUser?&id=<?php echo $_smarty_tpl->getValue('u')['uzytkownik_id'];?>
"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <?php if ($_smarty_tpl->getValue('u')['status_konta'] == 'A') {?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deactivateUser?&id=<?php echo $_smarty_tpl->getValue('u')['uzytkownik_id'];?>
"
                                   class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
activateUser?&id=<?php echo $_smarty_tpl->getValue('u')['uzytkownik_id'];?>
"
                                   class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            <?php }?>
                            
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteUser?&id=<?php echo $_smarty_tpl->getValue('u')['uzytkownik_id'];?>
"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Czy na pewno chcesz usunąć użytkownika?');">
                                <i class="bi bi-trash"></i>
                            </a>

                        </td>

                    </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>

            <?php } else { ?>
                <div class="alert alert-info m-3">
                    Brak użytkowników do wyświetlenia.
                </div>
            <?php }?>

        </div>
    </div>

    <!-- ===== komuniaty ===== -->
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
