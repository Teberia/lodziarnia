<?php
/* Smarty version 5.4.5, created on 2026-01-11 12:53:49
  from 'file:Login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69638f4dd11cc7_65162727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07c4a879b3f3588a67e4efa969d00662abe24c3b' => 
    array (
      0 => 'Login.tpl',
      1 => 1768131189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69638f4dd11cc7_65162727 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/lodziarnia/app/views';
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .login-card {
            max-width: 420px;
            width: 100%;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center">

<div class="login-card">

    <!-- ===== panel logowania ===== -->
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h2 class="fw-bold">🍦 Frosty Manager</h2>
                <p class="text-muted mb-0">Zaloguj się do systemu</p>
            </div>


            <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                            <?php if ($_smarty_tpl->getValue('msg')->type == 3) {?>
                                <li><?php echo $_smarty_tpl->getValue('msg')->text;?>
</li>
                            <?php }?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
                <div class="alert alert-success">
                    <ul class="mb-0">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                            <?php if ($_smarty_tpl->getValue('msg')->type == 1) {?>
                                <li><?php echo $_smarty_tpl->getValue('msg')->text;?>
</li>
                            <?php }?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>

            <!-- ===== formularz ===== -->
            <form method="post" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login">

                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input id="login"
                           name="login"
                           type="text"
                           class="form-control"
                           placeholder="Wprowadź login"
                           required>
                </div>

                <div class="mb-4">
                    <label for="haslo_hash" class="form-label">Hasło</label>
                    <input id="haslo_hash"
                           name="haslo_hash"
                           type="password"
                           class="form-control"
                           placeholder="Wprowadź hasło"
                           required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Zaloguj
                    </button>

                </div>

            </form>

        </div>
    </div>


    <p class="text-center text-muted mt-3 mb-0 small">
        System zarządzania lodziarnią
    </p>

</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
