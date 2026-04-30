<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAll()
    {
        return Task::latest()->get();
    }

    public function create($data)
    {
        return Task::create($data);
    }

    public function update($task, $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete($task)
    {
        $task->delete();
    }
}