<?php

namespace App\Repositories;

use App\DTO\UserFilterDTO;
use App\Models\Task;

class UserRepository
{
    public function getFiltered(UserFilterDTO $filters)
    {
        return Task::query()
            ->when($filters->role, fn($q) => $q->where('role', $filters->role))
            ->when($filters->status, fn($q) => $q->where('status', $filters->status->value))
            ->get();
    }
}
