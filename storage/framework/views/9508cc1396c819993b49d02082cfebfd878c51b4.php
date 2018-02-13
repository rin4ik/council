<nav class="navbar shadow " style="background-color:rgb(72, 71, 138); font-family:Montserrat,Helvetica,Arial,sans-serif;">

	<div class="container ">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a class="navbar-brand" href="<?php echo e(url('/')); ?>" style="font-weight:600; color:white; font-size:15px">
				<?php echo e(config('app.name')); ?>

			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">

				<li class="dropdown ">
					<a href="#" class="dropdown-toggle caps" style="color: white;" data-toggle="dropdown" role="button" aria-expanded="false"
					 aria-haspopup="true">
						Browse
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<a href="/threads">All Threads</a>
						</li>
						<?php if (auth()->guard()->check()): ?>
						<li>
							<a href="/threads?by=<?php echo e(auth()->user()->name); ?>">My Threads</a>
						</li>
						<?php endif; ?>
						<li>
							<a href="/threads?popular=1">Popular Threads</a>
						</li>
						<li>
							<a href="/threads?unanswered=1">Unanswered Threads</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="caps" href="/threads/create" style="color: white;">New Thread</a>
				</li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle caps" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true "
					 style="color: white;">
						Channels
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu channel">
						<?php $__empty_1 = true; $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach ($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> <?php if (count($channel)): ?>

						<li>
							<a href="/threads/<?php echo e($channel->slug); ?>"><?php echo e($channel->name); ?></a>
						</li>
						<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<li style="padding-left:7px">No relevant results!</li>
						<?php endif; ?>

					</ul>
				</li>
				<channel-dropdown :channels="<?php echo e($channels); ?>"></channel-dropdown>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				<?php if (auth()->guard()->guest()): ?>
				<li>
					<a class="caps" href="<?php echo e(route('login')); ?>" style="color: white;">Login</a>
				</li>
				<li>
					<a class="caps" href="<?php echo e(route('register')); ?> " style="color: white;">Register</a>
				</li>
				<?php else: ?> 
				<user-notifications></user-notifications>
				<?php if (Auth::user()->isAdmin()): ?>
		               <li><a style="color: white;" href="/admin"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
				                  <?php endif; ?>
				<li class="dropdown">
					<a class="caps" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
					 style="color: white;">
						<?php echo e(Auth::user()->name); ?>

						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<a href="/profiles/<?php echo e(Auth::user()->name); ?>">My Profile</a>
						</li>
						<li>
							<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
								Logout
							</a>

							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
								<?php echo e(csrf_field()); ?>

							</form>
						</li>
					</ul>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>