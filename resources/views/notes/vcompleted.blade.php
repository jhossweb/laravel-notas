@extends('layouts.layouts')

@section('title-app', 'Notes Completed')

@section('content')
	<div class="p-3">
		<div class="p-2 mb-2">
			<h2 class="text-4xl">
				Tareas Terminadas de: <strong> {{ Auth::user()->name }} </strong>
			</h2>
		</div>

			<div class="mt-12">
				<a href="{{ route('notes.create') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full">
					Created Notes
				</a>
			</div>


			<div class="grid grid-cols-3 justify-items-center gap-5">

				@foreach ($notes as $note)

					@if($note->completed)

						<div class="max-w-sm rounded overflow-hidden w-full shadow-lg bg-gray-100 my-5">
						  	<div class="px-6 py-4">
						    	<div class="font-bold text-xl mb-2"><a href="{{ route('notes.show', $note) }}"> {{ $note->title }} </a></div>

								<div class="w-auto">
									<p class="text-gray-700 text-base">
									    {{ $note->body }}
									</p>
								</div>
							</div>
						  <div class="px-6 pt-4 pb-2 flex">
						    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
						    	<a class="text-center" href="{{ route('notes.show', $note) }}">
						    		Update Note
						    	</a>
						    </span>
						    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
						    	<form action="{{ route('notes.destroy', $note) }}" method="POST">

									@csrf
									@method('delete')
									<button type="submit"> Delete Notes </button>
								</form>
						    </span>
						  </div>

						  {{-- Check para Terminar la tarea --}}
						  <div class="p-2 mx-5">
							  <form  action="{{ route('notes.completed', $note) }}" method="POST">
							  	@csrf     @method('PUT')
								<input type="checkbox" name="completed" {{ ($note->completed) ? 'checked' : '' }} class="checked:bg-gray-600 checked:border-transparent">
								<button type="submit"> Tarea Terminada </button>
							</form>
						  </div>
						</div>

					@else

						{{ $note->completed }}

					@endif

				@endforeach
			</div>


		{{ $notes->links() }}
	</div>
@endsection