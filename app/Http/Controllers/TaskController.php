<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function send(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = 'active'; // default status
        $task->categoryId = $request->input('categoryId');
        $task->endDate =
        $request->input('enddate');
        $task->startDate =
        $request->input('startdate');
        $task->save();

        return redirect('/')->with('success', 'Your task has been created successfully.');
    }
}
