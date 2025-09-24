<?php

namespace App\Http\Controllers;

use App\Domain\Tasks\Actions\CreateTask;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function store(CreateTaskRequest $request, CreateTask $create)
    {
        $task = $create($request->validated());
        return TaskResource::make($task);
    }
}