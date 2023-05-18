<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
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
        $task->endDate = $request->input('enddate'); // Assign end date value
        $task->startDate = $request->input('startdate'); // Assign start date value
        $task->createdBy = Auth::user()->name;
        $task->save();

        return redirect('/')->with('success', 'Your task has been created successfully.');
    }

}
