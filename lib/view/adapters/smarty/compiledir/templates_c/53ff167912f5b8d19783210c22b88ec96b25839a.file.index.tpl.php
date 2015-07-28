<?php /* Smarty version Smarty-3.1.20, created on 2015-07-17 14:27:58
         compiled from "c:\xampp\home\todo\www\todo-application.todo\app\resources\views\notfound\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1571255a8f4ce431dd0-32651241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53ff167912f5b8d19783210c22b88ec96b25839a' => 
    array (
      0 => 'c:\\xampp\\home\\todo\\www\\todo-application.todo\\app\\resources\\views\\notfound\\index.tpl',
      1 => 1437135959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1571255a8f4ce431dd0-32651241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_55a8f4ce46c768_88566792',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8f4ce46c768_88566792')) {function content_55a8f4ce46c768_88566792($_smarty_tpl) {?><style>
    body {
        background: url(../img/404.jpg) no-repeat;
        -moz-background-size: 100%; /* Firefox 3.6+ */
        -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
        -o-background-size: 100%; /* Opera 9.6+ */
        background-size: 100%; /* Современные браузеры */
    }
    a {
        font-size:20px;
        text-decoration:none;
        color:#3300FF;
        background-color:#FFFFFF;
    }
    a:visited {
        color:#3366FF;
    }
    a:hover {
        color:#000000;
    }
    a:active {
        color:#3300CC;
    }
</style>

<h1> 404 Not Found </h1>

<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
'>Main page</a>

<?php }} ?>
