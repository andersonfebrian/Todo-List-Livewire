<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoStoreRequest;
use App\Interfaces\ApiResponseMessage;
use App\Models\Todo;
use App\Services\TodoService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TodoController extends Controller implements ApiResponseMessage
{
	use ApiResponse;

	private $todoService;

	public function __construct(TodoService $todoService)
	{
		$this->todoService = $todoService;
	}

	public function index(Request $request)
	{
		return $this->success();
	}

	public function store(TodoStoreRequest $request)
	{
		$todo = $this->todoService->store($request);

		return $todo ?
			$this->success($todo, 'Successfully Created Todo.') :
			$this->error(null, self::GENERIC_ERROR);
	}

	public function edit(Todo $todo)
	{
		return $this->success($todo, 'Successfully Retrieved Todo.');
	}

	public function update(Request $request, Todo $todo)
	{
		$todo = $this->todoService->update($request, $todo);

		return $todo ?
			$this->success($todo, 'Successfully Update Todo.') :
			$this->error(null, self::GENERIC_ERROR);
	}

	public function destroy(Todo $todo)
	{
		$result = $this->todoService->destroy($todo);

		return $result ?
			$this->success(null, 'Successfully Removed Todo.') :
			$this->error(null, self::GENERIC_ERROR);
	}
}
