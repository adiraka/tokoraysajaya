<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title>Admin Panel</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/materialize.css')); ?>" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/materialdesignicons.css')); ?>" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/style.css')); ?>" media="screen,projection">

    <script src="<?php echo e(URL::asset('js/jquery.min.js')); ?>"></script>

</head>
<body>
    
    <?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div id="main">
        <div class="wrapper">
            <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <section id="content">
                <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="breadcrumbs-title"><?php echo e($title); ?></h5>
                                <ol class="breadcrumb"></ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="section">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </section>          
        </div>
    </div>

    <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <script src="<?php echo e(URL::asset('js/materialize.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>

</body>
</html>