<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ToDoList;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolist=ToDoList::all();
        return view('todolist.index')->with('todolist', $todolist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
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
        $task = new ToDoList();
        $task->title=$request->title;
        $task->description=$request->description;
        $task->user_id=auth()->user()->id;
        
        $task->save();
        return redirect('/todolist')->with('success', 'Entry successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = ToDoList::find($id);
        return view('todolist.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $task = ToDoList::find($id);
        return view('todolist.edit')->with('task', $task);
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
        $task= ToDoList::find($id);
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
        return redirect('/todolist'.$redirectToId)->with('success', 'Task information updated');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task= ToDoList::find($id);
        $task->delete();
        return redirect('/todolist')->with('success', 'Task deleted');
    }
}
