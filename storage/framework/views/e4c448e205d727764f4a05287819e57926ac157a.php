<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/img10.png">
	<title>Forum</title>

	<!-- Fonts -->
	rel="stylesheet">
	<!-- Styles -->
	<style>
		html,
		body {
			background-color: #eee0;
			color: #FFF;
		
			font-weight: 500;
			height: 100vh;
			margin: 0;
		}

		.links>a {
			color: #555;
		}

		.full-height {
			height: 80vh;
		}

		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}

		.position-ref {
			position: relative;
		}

		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}

		.content {
			text-align: center;
		}

		.title {
			font-size: 84px;
			font-weight: 400;
		}

		.links>a {
			padding: 0 25px;
			font-size: 12px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}

		.m-b-md {
			margin-bottom: 30px;
		}
	</style>
</head>

<body>
	<div class="flex-center position-ref full-height">
		<?php if(Route::has('login')): ?>
		<div class="top-right links">
			<?php if(auth()->guard()->check()): ?>
			<a href="<?php echo e(url('/home')); ?>">Home</a>
			<?php else: ?>
			<a href="<?php echo e(route('login')); ?>">Login</a>
			<a href="<?php echo e(route('register')); ?>">Register</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="content">


			<div class="title m-b-md">
				<a href="/threads" style="text-decoration: none; color:#727b7b">Threads</a>
			</div>

		</div>
	</div>
	<!-- Scripts -->
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html>