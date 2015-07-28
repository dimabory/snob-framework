<?php /* Smarty version Smarty-3.1.20, created on 2015-07-17 14:37:46
         compiled from "c:\xampp\home\todo\www\todo-application.todo\app\resources\views\account\view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1286155a8f71af26066-05797077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a551fd98744afecb4f994e172c74af2083498d0f' => 
    array (
      0 => 'c:\\xampp\\home\\todo\\www\\todo-application.todo\\app\\resources\\views\\account\\view.tpl',
      1 => 1437135959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1286155a8f71af26066-05797077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
    'method' => 0,
    'id' => 0,
    'user' => 0,
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_55a8f71b05ce27_02543921',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8f71b05ce27_02543921')) {function content_55a8f71b05ce27_02543921($_smarty_tpl) {?>Account View
<ul>
    <li>class=<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
</li>
    <li>method=<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</li>
<?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&isset($_smarty_tpl->tpl_vars['user']->value)) {?>
    <li>id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</li>
    <li>user=<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</li>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->setTitle('View');?>

<?php echo $_smarty_tpl->tpl_vars['this']->value->addCSS(array('href'=>'/css/index.css','rel'=>'stylesheet','media'=>'print'));?>



<?php }} ?>
