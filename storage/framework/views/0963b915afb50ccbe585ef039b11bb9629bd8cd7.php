<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title>Raisya Jaya</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/materialize.css')); ?>" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/materialdesignicons.css')); ?>" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/style.css')); ?>" media="screen,projection">

    <style type="text/css" media="screen">
        html,
        body {
            height: 100%;
        }
        html {
            display: table;
            margin: auto;
        }
        body {
            display: table-cell;
            vertical-align: middle;
        }
    </style>

    <script src="<?php echo e(URL::asset('js/jquery.min.js')); ?>"></script>

</head>
<body class="">

    <?php echo $__env->yieldContent('content'); ?>
    
    <script src="<?php echo e(URL::asset('js/materialize.js')); ?>"></script>

</body>
</html>