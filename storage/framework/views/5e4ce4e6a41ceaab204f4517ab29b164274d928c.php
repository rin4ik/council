<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.App = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]); ?>;
    </script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="font-sans bg-grey-lighter">
    <div id="app">
        <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="container mx-auto">
            <div class="flex">
                <?php $__env->startSection('sidebar'); ?>
                    <?php echo $__env->make('sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldSection(); ?>

                <div class="px-10 bg-white flex-1">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                 <?php echo $__env->make('channels-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>

        <flash  class="animated fadeInRight" message="<?php echo e(session('flash')); ?>"></flash>
<div v-cloak>
        <?php echo $__env->make('modals.all', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
    
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
