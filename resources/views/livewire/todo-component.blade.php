<div class="container h-100 d-flex flex-column justify-content-between">
	<div class="todo-component p-5">
		<div><h1>Todo List</h1></div>
		@forelse ($todos as $todo)
			<div class="todo-item">
				<input type="checkbox" wire:click="todoStatus({{ $todo }})" {{ $todo->is_completed ? "checked" : "" }}>

				<div class="px-2" style="flex: 1;">
					<p class="{{ $todo->is_completed ? 'text-through' : '' }}">{{ $todo->body }}</p>
				</div>
				
				<div class="d-flex gap-2">
					<button class="btn btn-sm btn-warning" wire:click="{{ isset($edited_todo) && $todo->id == $edited_todo->id ? "cancelTodo" : "editTodo($todo)" }}"> 
						{{isset($edited_todo) && $todo->id == $edited_todo->id ? 'Cancel' : 'Edit' }} 
					</button>
					<button class="btn btn-sm btn-danger" wire:click="deleteTodo({{ $todo }})"> Delete </button>
				</div>

			</div>
		@empty
			<div class="d-flex justify-content-center">No Todo...</div>
		@endforelse
		<form wire:submit.prevent="{{ $edited_todo == null ? 'storeTodo' : 'updateTodo' }}" class="mt-2">
			<input class="form-control p-1" type="text" wire:model="body">
			@error('body')
				<p class="alert alert-danger d-flex mt-2 mb-0 p-1"> {{ $message }} </p>
			@enderror
			<button class="btn {{ $edited_todo == null ? 'btn-success' : 'btn-warning' }} form-control mt-2" type="submit">{{ $edited_todo == null ? 'Add Todo' : 'Update Todo' }}</button>
		</form>
	</div>

	<div class="d-flex justify-content-center p-2">
		<footer><a href="https://github.com/andersonfebrian/TodoList" target="_blank">Github</a></footer>
	</div>
</div>

@push('styles')
	<style>
		.todo-component {
			display: flex;
			flex-direction: column;
			height: inherit;
			justify-content: center;
		}
		.todo-item {
			display: flex;
			align-items: center;
			margin: 0.5rem 0;
		}
	</style>
@endpush