<?php
/* Smarty version 5.4.5, created on 2026-01-05 23:35:18
  from 'file:navbar.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_695c3ca6926179_47981378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bfca387eae894de7e046049f227e4255d463acf' => 
    array (
      0 => 'navbar.tpl',
      1 => 1767652492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695c3ca6926179_47981378 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/amelia/app/views';
?>
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

                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')('',$_smarty_tpl->getValue('roles'))) {?>
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
<?php }
}
