@extends('layouts.layouts')

@section('title-app', 'Update Notes')

@section('content')
	<h2> Formulario para Actualizar Notas</h2>

	<form action="{{ route('notes.update', $notes) }}" method="POST">

		@csrf
		@method('PUT')

		<input type="text" name="title" value="{{ old('title', $notes->title) }}">
		@error('title')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>

		<textarea name="body" rows="10"> {{ old('body', $notes->body) }} </textarea>
		@error('body')
			<br>
			<small> * {{ $message }} </small>
		@enderror

		<br><br>
		<button type="submit"> Update notes </button>
	</form>
@endsection