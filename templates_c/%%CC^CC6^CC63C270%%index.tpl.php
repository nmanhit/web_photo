<?php /* Smarty version 2.6.31, created on 2022-10-06 09:53:37
         compiled from /usr/local/var/www/web_photo/configs/../views/category/index.tpl */ ?>
<?php ob_start(); ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Categories list</h3>
            <div class="panel-action">
                <a href="/web_photo/index.php?controller=category&action=create" class="btn btn-primary">New category</a>
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
                        <tr id="category-<?php echo $this->_tpl_vars['v']['id']; ?>
">
                            <th scope="row"><?php echo $this->_tpl_vars['v']['id']; ?>
</th>
                            <td><?php echo $this->_tpl_vars['v']['name']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['v']['description']; ?>
</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/web_photo/index.php?controller=category&action=detail&id=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="btn btn-primary">Edit</a>
                                    <button onclick="javascript:handleDeleteCategory(<?php echo $this->_tpl_vars['v']['id']; ?>
)" type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
                <script type="text/javascript">
                    <?php echo '
                    function handleDeleteCategory(id) {
                        const url = `/web_photo?controller=category&action=delete&id=${id}`;
                        const xhr = new XMLHttpRequest();
                        xhr.open("DELETE",url, true);
                        xhr.onload = function () {
                            const allRow = document.querySelector("table").rows;
                            for (const row of allRow) {
                                if(row.id === `category-${id}`) {
                                    row.remove();
                                }
                            }
                        }
                        xhr.send(null);
                    }
                    '; ?>

                </script>
            </table>
        </div>
    </div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('context', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../templates/layout.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>