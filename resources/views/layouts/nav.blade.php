<nav class="navbar shadow " style="background-color:rgb(72, 71, 138)">

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
			<a class="navbar-brand" href="{{ url('/') }}" style="font-weight:600; color:white; font-size:15px">
				{{ config('app.name') }}
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
						@auth
						<li>
							<a href="/threads?by={{auth()->user()->name}}">My Threads</a>
						</li>
						@endauth
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
				<li class="dropdown">
					<a href="#" class="dropdown-toggle caps" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true "
					 style="color: white;">
						Channels
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						@forelse ($channels as $channel) @if(count($channel))

						<li>
							<a href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
						</li>
						@endif @empty
						<li style="padding-left:7px">No relevant results!</li>
						@endforelse

					</ul>
				</li>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@guest
				<li>
					<a class="caps" href="{{ route('login') }}" style="color: white;">Login</a>
				</li>
				<li>
					<a class="caps" href="{{ route('register') }} " style="color: white;">Register</a>
				</li>
				@else {{--
				<span class=" dropdown message-count">{{ Auth::user()->notifications->count() }}</span> --}}
				<user-notifications></user-notifications>
				@if (Auth::user()->isAdmin())
		               <li><a style="color: white;" href="/admin"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a></li>
				                  @endif
				<li class="dropdown">
					<a class="caps" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
					 style="color: white;">
						{{ Auth::user()->name }}
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<a href="/profiles/{{ Auth::user()->name }}">My Profile</a>
						</li>
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
								Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>