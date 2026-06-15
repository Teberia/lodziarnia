<?php
/* Smarty version 5.4.5, created on 2026-05-10 13:54:10
  from 'file:InventoryTable.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a008e02947f30_69592917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2772b32b5f3755a931728e34a7f384bcbddd4749' => 
    array (
      0 => 'InventoryTable.tpl',
      1 => 1778421192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a008e02947f30_69592917 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/views';
?><div class="card shadow-sm">
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
                                <span class="badge bg-danger"><?php echo $_smarty_tpl->getValue('i')['dostepna_ilosc'];?>
 – niski stan</span>
                            <?php } else { ?>
                                <span class="badge bg-success"><?php echo $_smarty_tpl->getValue('i')['dostepna_ilosc'];?>
</span>
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($_smarty_tpl->getValue('i')['status'] == 'A') {?>
                                <span class="badge bg-success">Aktywny</span>
                            <?php } else { ?>
                                <span class="badge bg-secondary">Wycofany</span>
                            <?php }?>
                        </td>
                        <td class="text-end">
                            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editInventory?&id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <?php if ($_smarty_tpl->getValue('i')['status'] == 'A') {?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deactivateInventory?id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
" class="btn btn-sm btn-outline-warning" title="Dezaktywuj">
                                    <i class="bi bi-pause-circle"></i>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
activateInventory?id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
" class="btn btn-sm btn-outline-success" title="Aktywuj">
                                    <i class="bi bi-play-circle"></i>
                                </a>
                            <?php }?>

                            <?php if ($_smarty_tpl->getValue('i')['status'] == 'N') {?>
                                <a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteInventory?&id=<?php echo $_smarty_tpl->getValue('i')['smak_id'];?>
" class="btn btn-sm btn-outline-danger" onclick="return confirm('Czy na pewno usunąć smak?')">
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
                    <td colspan="4" class="text-center text-muted py-4">Brak smaków w magazynie</td>
                </tr>
            <?php }?>
            </tbody>
        </table>

    </div>

    <div class="card-footer bg-white border-top">
        <div class="row align-items-center">
            <div class="col-sm">
                <small class="text-muted">
                    Wyświetlono <?php echo $_smarty_tpl->getValue('pageFrom');?>
–<?php echo $_smarty_tpl->getValue('pageTo');?>
 z <?php echo $_smarty_tpl->getValue('totalRows');?>
 wyników
                </small>
            </div>
            <div class="col-sm-auto">
                <?php if ($_smarty_tpl->getValue('pages') > 1) {?>
                    <nav aria-label="Paginacja">
                        <ul class="pagination mb-0">
                            <li class="page-item <?php if ($_smarty_tpl->getValue('page') == 1) {?>disabled<?php }?>">
                                <a class="page-link page-link-js" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory?ajax=1&page=<?php echo $_smarty_tpl->getValue('page')-1;?>
&q=<?php echo rawurlencode((string)$_smarty_tpl->getValue('search'));?>
&status=<?php echo rawurlencode((string)$_smarty_tpl->getValue('status'));?>
">Poprzednia</a>
                            </li>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pageNumbers'), 'pageNumber');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pageNumber')->value) {
$foreach2DoElse = false;
?>
                                <li class="page-item <?php if ($_smarty_tpl->getValue('page') == $_smarty_tpl->getValue('pageNumber')) {?>active<?php }?>">
                                    <a class="page-link page-link-js" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory?ajax=1&page=<?php echo $_smarty_tpl->getValue('pageNumber');?>
&q=<?php echo rawurlencode((string)$_smarty_tpl->getValue('search'));?>
&status=<?php echo rawurlencode((string)$_smarty_tpl->getValue('status'));?>
"><?php echo $_smarty_tpl->getValue('pageNumber');?>
</a>
                                </li>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            <li class="page-item <?php if ($_smarty_tpl->getValue('page') == $_smarty_tpl->getValue('pages')) {?>disabled<?php }?>">
                                <a class="page-link page-link-js" href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
inventory?ajax=1&page=<?php echo $_smarty_tpl->getValue('page')+1;?>
&q=<?php echo rawurlencode((string)$_smarty_tpl->getValue('search'));?>
&status=<?php echo rawurlencode((string)$_smarty_tpl->getValue('status'));?>
">Następna</a>
                            </li>
                        </ul>
                    </nav>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }
}
