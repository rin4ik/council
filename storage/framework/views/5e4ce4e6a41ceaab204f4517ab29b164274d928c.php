<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/img10.png">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<title>Forum</title>
	<!-- Styles -->
	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


	<script>
		window.App=<?php echo json_encode(['csrfToken'=>csrf_token(),
      'user'=>Auth::user(),
      'signedIn'=>Auth::check()
      ]); ?>;
	</script>
	<?php echo $__env->yieldContent('header'); ?>

</head>

<body>
	
	<div id="app">
		<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->yieldContent('content'); ?>
		<flash message="<?php echo e(session('flash')); ?>"></flash>

	</div>

	<!-- Scripts -->


	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</html>