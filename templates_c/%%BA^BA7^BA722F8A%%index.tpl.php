<?php /* Smarty version 2.6.31, created on 2022-09-25 13:42:36
         compiled from ../views/category/index.tpl */ ?>
<?php ob_start(); ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Categories list</h3>
            <div class="panel-action">
                <a href="/demo/Controller/category/create.php" class="btn btn-primary">New category</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 135px">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                        <tr>
                            <th scope="row"><?php echo $this->_tpl_vars['v']->id; ?>
</th>
                            <td><?php echo $this->_tpl_vars['v']->name; ?>
</td>
                            <td><?php echo $this->_tpl_vars['v']->description; ?>
</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/demo/Controller/category/edit.php?id=<?php echo $this->_tpl_vars['v']->id; ?>
" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('context', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../templates/layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>