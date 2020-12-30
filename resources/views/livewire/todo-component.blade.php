<div>
	<h1>Todo List</h1>
	@foreach ($todos as $todo)
		<div>
			<input type="checkbox" wire:click="todoStatus({{ $todo }})" {{ $todo->is_completed ? "checked" : "" }}>
			<p class="{{ $todo->is_completed ? 'text-through' : '' }}">{{ $todo->body }}</p>
			<button wire:click="{{ isset($edited_todo) && $todo->id == $edited_todo->id ? "cancelTodo" : "editTodo($todo)" }}"> {{isset($edited_todo) && $todo->id == $edited_todo->id ? 'Cancel' : 'Edit' }} </button> | <button wire:click="deleteTodo({{ $todo }})"> Delete </button><br>
		</div>
	@endforeach
	<form wire:submit.prevent="{{ $edited_todo == null ? 'storeTodo' : 'updateTodo' }}">
		<input type="text" wire:model="body">
		@error('body') {{ $message }} @enderror
		<button type="submit">{{ $edited_todo == null ? 'Add Todo' : 'Update Todo' }}</button>
	</form>
</div>