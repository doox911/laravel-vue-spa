<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    const LEVEL_TYPES = [
        [
            'description' => 'Пользователь',
            'value' => User::class
        ],
        [
            'description' => 'Задача',
            'value' => Task::class
        ],
    ];

    public static function getLevelTypes ()
    {
        return response()->json(self::LEVEL_TYPES);
    }
}
