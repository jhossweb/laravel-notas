@extends('layouts.layouts')

@section('title-app', 'Create Notes')

@section('content')
	<h2> Formulario para crear notas</h2>

	<form action="{{ route('notes.store') }}" method="POST">

		@csrf
		<input type="hidden" name="user_id" value="{{ Auth::id() }}">

		<input type="text" name="title" placeholder="Titulo de la Nota" value="{{ old('title') }}">
		@error('title')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>

		<textarea name="body" rows="10"> {{ old('body') }} </textarea>
		@error('body')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>

		<button type="submit"> Save notes </button>
	</form>
@endsection