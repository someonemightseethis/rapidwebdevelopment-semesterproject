<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;

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
        DB::table('tasks')->where('id', $id)->delete();
        //update
        //now when i make changes i just need to go to the git extention tab, add a comment and commit

        if (DB::table('tasks')->count() === 0) {
            DB::table('tasks')->truncate();
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
