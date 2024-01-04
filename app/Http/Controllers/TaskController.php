<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('index');
    }
    public function storeTask(Request $request){
        $taskId = $request->id;
        $task = Task::updateOrCreate(
            ['id'=>$taskId],
            ['task'=>$request->task]
        );
        return Response()->json($task);
    }
    public function storeTask2(Request $request){
        $taskId2 = $request->id;
        $task2 = Task::updateOrCreate(
            ['id'=>$taskId2],
            ['task'=>$request->task2]
        );
        return Response()->json($task2);
    }

    //test
    public function testView(){
        return view('test');
    }
}


