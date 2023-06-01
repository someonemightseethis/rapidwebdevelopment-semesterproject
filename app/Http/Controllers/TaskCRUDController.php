<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskCRUDController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get()->map(function ($task) {
            $task->delete_url = route('tasks.delete', $task->id);
            return $task;
        });

        return view('home', ['tasks' => $tasks]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        $tasks = Task::all();

        foreach ($tasks as $task) {
            $endDate = Carbon::parse($task->end_date);
            $currentDate = Carbon::now();
            $daysUntilEnd = $currentDate->diffInDays($endDate);

            if ($daysUntilEnd <= 2 && $task->status !== 'Completed') {
                $task->status = 'Ending Soon';
            } else {
                $task->status = 'Active';
            }

            $task->save();
        }

        if (Task::count() === 0) {
            Task::truncate();
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('taskedit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->endDate = $request->input('enddate');
        $task->startDate = $request->input('startdate');

        $endDate = Carbon::parse($request->input('enddate'));
        $currentDate = Carbon::now();
        $daysUntilEnd = $currentDate->diffInDays($endDate);

        if ($daysUntilEnd <= 2) {
            $task->status = 'Ending Soon';
        } else {
            $task->status = 'Active';
        }

        $task->save();

        return redirect('/');
    }

    /* public function deletetask(Request $request)
    {
        $task_id = $request->task_id;
        DB::table('tasks')->where('id', $task_id)->delete();
        return response()->json(['success' => 'Task deleted successfully']);
    } */
}
