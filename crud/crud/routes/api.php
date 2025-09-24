<?php

use App\Http\Controllers\TaskController;

Route::post('tasks', [TaskController::class, 'store']);