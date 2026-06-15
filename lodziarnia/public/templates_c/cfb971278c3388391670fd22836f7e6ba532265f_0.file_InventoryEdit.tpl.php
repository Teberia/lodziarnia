<?php
/* Smarty version 5.4.5, created on 2026-04-08 21:52:54
  from 'file:InventoryEdit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69d6ce36bba3d2_39612121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfb971278c3388391670fd22836f7e6ba532265f' => 
    array (
      0 => 'InventoryEdit.tpl',
      1 => 1767643227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69d6ce36bba3d2_39612121 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/views';
?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title><?php if ($_smarty_tpl->getValue('item')) {?>Edytuj smak<?php } else { ?>Dodaj smak<?php }?></title>

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
                        <?php if ($_smarty_tpl->getValue('item')) {?>Edytuj smak<?php } else { ?>Dodaj nowy smak<?php }?>
                    </h3>

                    <form method="post" action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
saveInventory">

                        <?php if ($_smarty_tpl->getValue('item')) {?>
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('item')['smak_id'];?>
">
                        <?php }?>

                        <div class="mb-3">
                            <label class="form-label">Nazwa smaku</label>
                            <input type="text"
                                   name="nazwa"
                                   class="form-control"
                                   value="<?php echo (($tmp = $_smarty_tpl->getValue('item')['nazwa'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Dostępna ilość</label>
                            <input type="number"
                                   step="0.1"
                                   name="dostepna_ilosc"
                                   class="form-control"
                                   value="<?php echo (($tmp = $_smarty_tpl->getValue('item')['dostepna_ilosc'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory"
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

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
