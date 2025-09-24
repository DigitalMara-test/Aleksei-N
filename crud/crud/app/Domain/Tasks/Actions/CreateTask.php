<?php

namespace App\Domain\Tasks\Actions;

use App\Domain\Tasks\Contracts\TaskRepository;
use App\Models\Task;

class CreateTask
{
    public function __construct(private TaskRepository $tasks) {}

    public function __invoke(array $validated): Task
    {
        return $this->tasks->create($validated);
    }
}