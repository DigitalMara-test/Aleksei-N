<?php

namespace App\DTO;

use App\Enums\StatusTypes;

class UserFilterDTO
{
    public function __construct(
        public ?string $role = null,
        public StatusTypes $status,
    ) {}
}
