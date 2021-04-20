@extends('layouts.layouts')

@section('title-app', 'Login')

@section('content')

	<div class="grid justify-items-center p-5">

		<h2 class="text-4xl"> Form Login </h2>

		<form class="bg-gray-50 p-3 rounded-lg m-5" action="{{ route('users.auth') }}" method="POST">
			<div class="w-80 p-4 space-y-6 sm:justify-items-center">
				@csrf
				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="email" name="email" placeholder="Email">
				@error('email')
					<br>
					<small class="text-red-700"> * {{ $message }} </small>
				@enderror

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="password" name="password" placeholder="Password">
				@error('password')
					<br>
					<small class="text-red-700"> * {{ $message }} </small>
				@enderror

				<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded  p-3 w-full" type="submit"> Login </button>

				<div class="grid justify-items-center">
					<a class="text-xs border border-gray-400 p-2 hover:bg-gray-400" href="{{ route('users.register') }}"> Register </a>
				</div>
			</div>

		</form>
	</div>

@endsection