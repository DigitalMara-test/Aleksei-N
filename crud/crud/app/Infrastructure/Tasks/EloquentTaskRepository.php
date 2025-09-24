<?php

namespace App\Infrastructure\Tasks;

use App\Domain\Tasks\Contracts\TaskRepository;
use App\Models\Task;

class EloquentTaskRepository implements TaskRepository
{
    public function create(array $data): Task
    {
        return Task::query()->create($data);
    }
}