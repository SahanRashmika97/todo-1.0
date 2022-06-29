<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function index()
    {
        $response['tasks'] = $this->task->all();
        //dd($response); <-this code use to find request is working or not
        return view('pages.todo.index')->with($response);
    }
    public function store(Request $request)
    {
        //dd($request); <-this code use to find request is working or not
        $this->task->create($request->all());

        return redirect()->back(); // you can use this code to retrun back to the same path
       // return redirect()->route('home'); //you can use this code to redirect to the another destination
    }
    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();

        return redirect()->back();
    }
    public function done($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();

        return redirect()->back();
    }
}
