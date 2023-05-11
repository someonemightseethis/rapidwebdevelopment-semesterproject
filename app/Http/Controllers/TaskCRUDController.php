<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
