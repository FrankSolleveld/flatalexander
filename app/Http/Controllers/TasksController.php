<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() {
        // Eloquent syntax. BIn the top we use App\Task so we don't have to repeat App\ everytime we use an Eloquent query,
        $tasks = Task::all();

        return view('tasks.index', compact( 'tasks'));
    }

    public function show($id) {
        //    $task = DB::table('tasks')->find($id);
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }
}
