<?php

namespace App\Enums;

enum StatusTypes: string
{
    case Cancelled = 'cancelled';
    case Ready = 'ready';
}