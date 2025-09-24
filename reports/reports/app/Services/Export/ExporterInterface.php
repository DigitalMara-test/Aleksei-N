<?php

use App\DTO\UserFilterDTO;

interface ExporterInterface
{
    public function export(array $data): string;
}