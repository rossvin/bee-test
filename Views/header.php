<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="<?php echo PATH ?>public/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH ?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH ?>public/bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<div id="header">

    <?php if(Session::get('loggedIn') == true):?>
        <a class="btn btn-primary" href="<?php echo PATH ?>Login/logout">Logout</a>

    <?php else: ?>
        <a class="btn btn-primary" href="<?php echo PATH ?>Login/index">Login</a>
    <?php endif; ?>
    <a  class="btn btn-default" href="<?php echo PATH ?>">На главную</a>
    <a id="add-bat" class="btn btn-default" href="<?php echo PATH ?>index/add">Добавить задачу</a>

</div>
