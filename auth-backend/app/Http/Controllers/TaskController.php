<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Models\Task;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return response()->json($this->taskService->getAll());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        return response()->json(
            $this->taskService->create($request->all()), 201
        );
    }

    public function update(Request $request, Task $task)
    {
        return response()->json(
            $this->taskService->update($task, $request->all())
        );
    }

    public function destroy(Task $task)
    {
        $this->taskService->delete($task);
        return response()->json(['message' => 'Deleted']);
    }
}