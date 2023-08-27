<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){

    }

    public function update(Request $request){
      $task = Task::findOrFail($request->taskId);
      $task->is_done = $request->status;
      $task->save();
      return ['success'=>true];
    }
    public function create(Request $request){
        $category = Category::all();
        $data['categories'] = $category;
        return view('tasks/create',$data);
    }

    public function create_action(Request $request){
        $task = $request->only(['title','category_id','description','due_date']);
        $task['user_id'] = 1;
        $dbtask = Task::create($task);
        return redirect(route('home'));
    }
    public function edit(Request $request){
        $id = $request->id;
        $task = Task::find($id);
            if(!$task){
                return redirect(route('home'));
            }
            $category = Category::all();
        $data['categories'] = $category;
            $data['task'] = $task;
        return view('tasks.edit',$data);
    }

    public function edit_action(Request $request){
       $data_request = $request->only(['title','due_date','category_id','description']);
       $data_request['is_done'] = $request->is_done ? true : false ;
       $task  = Task::find($request->id);
        if(!$task){
            return redirect(route('task.edit'));
        }
        $task->update($data_request);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $task = Task::find($id);
            if($task){
                $task->delete();
            }
        return redirect(route('home'));
    }
}
