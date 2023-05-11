<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('home')->with('tasks', $tasks);
    }

    public function send(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->task = $request->input('task');
        $task->save();

        return redirect('/')->with('success', 'Your message has been sent successfully.');
    }
}