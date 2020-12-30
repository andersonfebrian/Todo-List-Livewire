<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoComponent extends Component
{
		public $body;
		// public $is_completed = [];
		public $state = [];
		public $to_edit_id;
		public $edited_todo;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
			'body' => 'required|min:3'
    ];

    public function storeTodo(){
			$this->validate();
			$todo = Todo::create([
				'body' => $this->body
			]);

			$this->state[$todo->id] = 'edit';

			$this->body = '';
			return $this->emitSelf('refreshComponent');
    }

    public function editTodo(Todo $todo){
			$this->edited_todo = $todo;
			// foreach(Todo::all() as $refreshTodo){
			// 	$this->state[$refreshTodo->id] = 'edit'; 
			// }
			$this->body = $todo->body;
			// $this->to_edit_id = $todo->id;
			// $this->state[$todo->id] = 'cancel';
			return $this->emit('refreshComponent');
		}

		public function updateTodo(){
			$this->validate();
			Todo::where('id', $this->to_edit_id)->update([
				'body' => $this->body
			]);

			$this->state[$this->to_edit_id] = 'edit';

			$this->to_edit_id = '';
			$this->body = '';

			return $this->emitSelf('refreshComponent');
		}
		
		public function cancelTodo(){
			$this->reset(['body', 'edited_todo']);
			return $this->emit('refreshComponent');
		}

    public function deleteTodo(Todo $todo){
			$todo->delete();
			return $this->emitSelf('refreshComponent');
		}
		
		public function todoStatus(Todo $todo){
			$todo->update(['is_completed' => !$todo->is_completed]);
			return $this->emitSelf('refreshComponent');
		}

		public function mount($state = 'edit'){
			foreach(Todo::all() as $todo){
				$this->state[$todo->id] = $state;
			}
		}

    public function render()
    {
			return view('livewire.todo-component', ['todos' => Todo::all()])->layout('index');
    }
}
