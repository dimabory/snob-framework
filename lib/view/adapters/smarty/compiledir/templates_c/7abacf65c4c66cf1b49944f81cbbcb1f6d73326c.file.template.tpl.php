<?php /* Smarty version Smarty-3.1.20, created on 2015-07-17 14:37:47
         compiled from "c:\xampp\home\todo\www\todo-application.todo\app\resources\layouts\template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1080255a8f71b0a3331-49262064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7abacf65c4c66cf1b49944f81cbbcb1f6d73326c' => 
    array (
      0 => 'c:\\xampp\\home\\todo\\www\\todo-application.todo\\app\\resources\\layouts\\template.tpl',
      1 => 1437135959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1080255a8f71b0a3331-49262064',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'css' => 0,
    'item' => 0,
    'attribute' => 0,
    'value' => 0,
    'js' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_55a8f71b13f776_91496662',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8f71b13f776_91496662')) {function content_55a8f71b13f776_91496662($_smarty_tpl) {?><?php if (!is_callable('smarty_block_t')) include 'C:\\xampp\\home\\todo\\www\\todo-application.todo\\lib\\view\\adapters\\smarty\\plugins\\block.t.php';
?><!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if (('item')) {?>
            <link
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['attribute']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <?php echo $_smarty_tpl->tpl_vars['attribute']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
            <?php } ?>
            />
        <?php }?>
    <?php } ?>
    <script src='/js/jquery-2.1.3.js'></script>
    <script src="/js/forLanguageLink.js"></script>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if (('item')) {?>
            <script
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['attribute']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                <?php echo $_smarty_tpl->tpl_vars['attribute']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
            <?php } ?>
            ></script>
        <?php }?>
    <?php } ?>
</head>
<body>
<div>
    <header>
        <a class="ru" >RU</a>
        <a class="en" >EN</a>
        <a class="fr" >FR</a>
        <h1><?php $_smarty_tpl->smarty->_tag_stack[] = array('t', array()); $_block_repeat=true; echo smarty_block_t(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
You are viewing the template page!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_t(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h1>
    </header>
    <hr>
    <section>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </section>
    <hr>
    <footer>
    </footer>
</div>
</body>
</html>
<?php }} ?>
