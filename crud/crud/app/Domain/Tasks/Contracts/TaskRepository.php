<?php

namespace App\Domain\Tasks\Contracts;

use App\Models\Task;

interface TaskRepository
{
    public function create(array $data): Task;
}