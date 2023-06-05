<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        \View::share('tasks', $tasks);
        return view('dashboard');
    }
}
