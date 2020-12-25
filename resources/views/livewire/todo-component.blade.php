<div>
	<h1>Todo List</h1>
	@foreach ($todos as $todo)
		<div>
			<input type="checkbox" wire:click="todoStatus({{ $todo }})" wire:model="is_completed.{{ $todo->id }}">
			<p class="{{ $todo->is_completed ? 'text-through' : '' }}">{{ $todo->body }}</p>
			<button wire:click="{{ $state[$todo->id] == 'edit' ? "editTodo($todo)" : "cancelTodo($todo)" }}" wire:model="state.{{ $todo->id }}"> {{ $state[$todo->id] == 'edit' ? 'Edit' : 'Cancel' }} </button> | <button wire:click="deleteTodo({{ $todo }})"> Delete </button><br>
		</div>
	@endforeach
	<form wire:submit.prevent="{{ $to_edit_id == null ? 'storeTodo' : 'updateTodo' }}">
		<input type="text" wire:model="body">
		@error('body') {{ $message }} @enderror
		<button type="submit">{{ $to_edit_id == null ? 'Add Todo' : 'Update Todo' }}</button>
	</form>
</div>