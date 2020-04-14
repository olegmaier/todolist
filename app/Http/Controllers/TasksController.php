<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Get a validator for an incoming store request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeValidator($request->all())->validate();
        $tasks = new Task();
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        $tasks->user_id=auth()->user()->id;
        
        $tasks->save();
        return redirect('/tasks')->with('success', 'Entry successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task= Task::find($id);
        $redirectToId="";
        if(isset($request->title))
        {
            $task->title=$request->title;
        }
        if(isset($request->description))
        {
            $task->description=$request->description;
        }
      
        $status=$request->task_done=='on'?1:0;
        $task->task_done=$status;

        if(isset($request->redirectToId))
        {
            $redirectToId='/'.$id;
        }
        
        $task->update();
        return redirect('/tasks'.$redirectToId)->with('success', 'Task information updated');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task= Task::find($id);
        $task->delete();
        return redirect('/tasks')->with('success', 'Task deleted');
    }
}
