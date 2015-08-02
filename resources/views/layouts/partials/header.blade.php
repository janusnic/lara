		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
				
					<ul>
						<li class="active"><a href="{{ url('/') }}">Homepage</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="{!!URL::to('github')!!}">Login</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<ul>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" alt="" width="50"/>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{config('authenticator.login_redirect')}}">My Dashboard</a></li>
                            <li><a href="{{config('authenticator.logout')}}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
				
				</nav>
				
			</div>
			<div class="container"> 
				
				<!-- Logo -->
				<div id="logo">
					<h1><a href="#">Linear</a></h1>
					<span class="tag">By TEMPLATED</span>
				</div>
			</div>
		</div>
