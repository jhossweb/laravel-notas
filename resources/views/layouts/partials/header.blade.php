<header class="grid grid-cols-2 justify-evenly sm:justify-between bg-gray-800 p-4">

	<div class="flex space-x-4">
		<h1>
			<a class="texto-9xl text-white" href="{{ route('home') }}"> <i class="fas fa-home"></i> App Notes </a>
		</h1>
		@auth
			<div>
				<a class="text-white" href="{{ route('notes.index') }}"> <i class="fas fa-sticky-note"> </i>	Notes 	</a>
			</div>
			<div>
				<a class="text-white" href="{{ route('notes.nc') }}"> <i class="fas fa-sticky-note"> </i>	Notes Terminadas 	</a>
			</div>
	</div>

	<div class="grid justify-items-end">
		<form style="display: inline;" action="{{ route('users.logout') }}" method="POST">
			@csrf
			<a class="text-white" href="#" onclick="this.closest('form').submit()"> <i class="fas fa-sign-out-alt"></i> Logout </a>
		</form>

		@else
			<div class="">
				<a class="text-white p-3 hover:bg-gray-500" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> Login </a>
			</div>

		@endauth
	</div>


</header>