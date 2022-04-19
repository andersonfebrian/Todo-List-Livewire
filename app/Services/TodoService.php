<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoService
{
  public function store(Request $request)
  {
    $todo = Todo::create([
      'body' => $request->body,
      'is_completed' => $request->is_completed ?? false,
    ]);

    return $todo;
  }

  public function update(Request $request, Todo $todo)
  {
    $todo->update($request->only('body', 'is_completed'));

    return $todo->refresh();
  }

  public function destroy(Todo $todo)
  {
    return $todo->delete();
  }
}
