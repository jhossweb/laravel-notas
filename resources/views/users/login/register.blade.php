@extends('layouts.layouts')

@section('title-app', 'Register')

@section('content')

	{{-- <div class="grid-justify-items-start md:justify-items-center p-5">
		<h2> Form Register </h2>

		<form class="bg-gray-50 p-3 rounded-lg m-5" action="{{ route('users.signup') }}" method="POST">
			<div class="w-80 p-4 space-y-6">
				@csrf

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
				@error('name')
					<br>
					<small> * {{ $message }} </small>
				@enderror

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
				@error('email')
					<br>
					<small> * {{ $message }} </small>
				@enderror

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
				@error('password')
					<br>
					<small> * {{ $message }} </small>
				@enderror

				<button type="submit"> Sign Up </button>
				<p> <a href="{{ route('login') }}"> Login </a> </p>
			</div>
		</form>
	</div> --}}

	<div class="grid justify-items-start md:justify-items-center p-5">

		<h2 class="text-4xl"> Form Register </h2>

		<form class="bg-gray-50 p-3 rounded-lg m-5" action="{{ route('users.signup') }}" method="POST">
			<div class="w-80 p-4 space-y-6">
				@csrf
				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
				@error('name')
					<br>
					<small class="text-red-700"> * {{ $message }} </small>
				@enderror

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
				@error('email')
					<br>
					<small class="text-red-700"> * {{ $message }} </small>
				@enderror

				<input class="border border-gray-400 focus-within:text-gray-800 p-3 w-full" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
				@error('password')
					<br>
					<small class="text-red-700"> * {{ $message }} </small>
				@enderror

				<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded  p-3 w-full" type="submit"> Register </button>

				<div class="grid justify-items-center">
					<a class="text-xs border border-gray-400 p-2 hover:bg-gray-400" href="{{ route('login') }}"> Login </a>
				</div>
			</div>

		</form>
	</div>

@endsection