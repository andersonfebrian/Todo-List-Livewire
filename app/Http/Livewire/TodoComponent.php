<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoComponent extends Component
{
		public $body;
		public $edited_todo;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected $rules = [
			'body' => 'required|min:3'
    ];

    public function storeTodo(){
			$this->validate();
			Todo::create([
				'body' => $this->body
			]);

			$this->reset(['body']);
			return $this->emitSelf('refreshComponent');
    }

    public function editTodo(Todo $todo){
			$this->edited_todo = $todo;
			$this->body = $todo->body;
			return $this->emit('refreshComponent');
		}

		public function updateTodo(){
			$this->validate();
			$this->edited_todo->update([
				'body' => $this->body
			]);
			$this->reset(['body', 'edited_todo']);
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

    public function render()
    {
			return view('livewire.todo-component', ['todos' => Todo::all()])->layout('layouts.main');
    }
}
