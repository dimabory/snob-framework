<?php /* Smarty version Smarty-3.1.20, created on 2015-07-20 13:24:34
         compiled from "c:\xampp\home\todo\www\todo-application.todo\app\resources\views\account\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:627555a8f4cda8e8a5-83587919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6473b62779110a7618d929e40e3a8ea1672c159d' => 
    array (
      0 => 'c:\\xampp\\home\\todo\\www\\todo-application.todo\\app\\resources\\views\\account\\index.tpl',
      1 => 1437390714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '627555a8f4cda8e8a5-83587919',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_55a8f4cdb59af9_92289058',
  'variables' => 
  array (
    'class' => 0,
    'method' => 0,
    'users' => 0,
    'user' => 0,
    'recipes' => 0,
    'recipe' => 0,
    'orders' => 0,
    'order' => 0,
    'this' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8f4cdb59af9_92289058')) {function content_55a8f4cdb59af9_92289058($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\xampp\\home\\todo\\www\\todo-application.todo\\lib\\view\\adapters\\smarty\\plugins\\block.t.php';
?><div class="raw">
    <div class="span12">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Account Index<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


        <ul>
            <li><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</li>
        </ul>
    </div>
</div>

<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#users"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Users<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
    <li><a href="#recipes"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Recipes<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
    <li><a href="#orders"><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Orders<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="users">
        <div class="span12">
            <h4><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Users:<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h4>
            <form class="form-inline" action="/account/addUser" method="POST">
                <div class="form-group">
                    <label for=username">Enter</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <button type="submit" class="btn btn-default">Add</button>
                </div>
            </form>
                <table class="table table-hover">
                    <thead><tr><th>ID</th><th>Name</th><th>Action</th></tr></thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                        <tr user_id="<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</td>
                            <td class="action">
                                <a href="#users/delete/?id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
" class="delete btn btn-danger">Delete</a>
                                <!-- Modal -->
                                <div id="deleteModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Delete</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="submit btn btn-sm">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="tab-pane" id="recipes">
        <div class="span12">
            <h4><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Recipes:<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h4>
            <table class="table table-striped">
                <thead><tr><th>ID</th><th>Name</th></tr></thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['recipe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recipe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recipes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recipe']->key => $_smarty_tpl->tpl_vars['recipe']->value) {
$_smarty_tpl->tpl_vars['recipe']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['recipe']->value->getId();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['recipe']->value->getName();?>
</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane" id="orders">
        <div class="span12">
            <h4><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Orders:<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h4>
            <table class="table table-condensed">
                <thead><tr><td>Username</td><td>RecipeId</td><td>RecipeName</td></tr></thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value->getUser()->getName();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value->getRecipe()->getId();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['order']->value->getRecipe()->getName();?>
</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#myTab a').click(function (e) {
        $(this).tab('show');
    });
    $('.action > .delete').click(function (e) {
        $('#deleteModal').modal('show');
    });
    $("#deleteModal .submit").click(function(e) {
        vars = [];
        hash = [];
        q = $(location).attr('href').split('?')[1];
        if (q != undefined) {
            q = q.split('&');
            for (var i = 0; i < q.length; i++) {
                hash = q[i].split('=');
                vars.push(hash[1]);
                vars[hash[0]] = hash[1];
            }
        }

        $.post("/account/delete" , { id : vars['id'] })
            .done(function( data ) {
                $('[user_id='+vars['id']+']').remove();
                $('#deleteModal').modal('hide');
            })
            .fail(function( data ) {
            alert( "Data Failed: " + data );
        });
    });

</script>

<?php echo $_smarty_tpl->tpl_vars['this']->value->setTitle("Index");?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->addCSS(array('href'=>'/css/index.css','rel'=>'stylesheet','media'=>'screen'));?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->addJS(array('src'=>'/js/test2.js','async'=>null));?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->addJS(array('src'=>'/js/test.js','defer'=>null));?>

<?php }} ?>
