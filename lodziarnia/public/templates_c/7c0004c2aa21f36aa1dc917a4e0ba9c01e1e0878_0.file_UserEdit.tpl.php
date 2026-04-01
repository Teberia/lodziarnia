<?php
/* Smarty version 5.4.5, created on 2026-01-11 12:45:03
  from 'file:UserEdit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69638d3f267ee7_96799487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c0004c2aa21f36aa1dc917a4e0ba9c01e1e0878' => 
    array (
      0 => 'UserEdit.tpl',
      1 => 1768131158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69638d3f267ee7_96799487 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/amelia/app/views';
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Dodaj użytkownika</title>

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
    <div class="mb-3">
        <h1>Dodaj nowego użytkownika</h1>
        <p class="text-muted">Uzupełnij dane użytkownika i przypisz rolę</p>
    </div>

    <!-- ===== formularz ===== -->
    <div class="card">
        <div class="card-body">

            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
saveUser" method="post">

            <?php if ((true && (true && null !== ($_smarty_tpl->getValue('user')['uzytkownik_id'] ?? null)))) {?>
    <input type="hidden" name="uzytkownik_id" value="<?php echo $_smarty_tpl->getValue('user')['uzytkownik_id'];?>
">
<?php }?>

                <div class="row g-3">

                    <!-- IMIĘ -->
                    <div class="col-md-6">
                        <label class="form-label">Imię</label>
                        <input type="text"
                               name="imie"
                               value="<?php echo (($tmp = $_smarty_tpl->getValue('user')['imie'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                               class="form-control"
                               required>
                    </div>

                    <!-- NAZWISKO -->
                    <div class="col-md-6">
                        <label class="form-label">Nazwisko</label>
                        <input type="text"
                               name="nazwisko"
                               value="<?php echo (($tmp = $_smarty_tpl->getValue('user')['nazwisko'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                               class="form-control"
                               required>
                    </div>

                    <!-- LOGIN -->
                    <div class="col-md-6">
                        <label class="form-label">Login</label>
                        <input type="text"
                               name="login"
                               value="<?php echo (($tmp = $_smarty_tpl->getValue('user')['login'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
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

                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
userList"
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


    <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
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

</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
