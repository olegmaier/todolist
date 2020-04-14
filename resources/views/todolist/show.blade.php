@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TASK INFO</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-md-12">                               
                                 <form action="{{action('ToDoListController@destroy', ['id'=>$task->id])}}" method="post" class="form-inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger pull-right" value="Delete" onclick="return confirm('Are you sure you want to delete task &quot;{{$task->title}}&quot;?')">
                                    
                                </form>
                                <h4>{{$task->title}}</h4>
                                    <div class=""> 
                                        <table class="table">
                                            <tr>
                                                <td>Description</td>
                                                <td>{{$task->description}}</td>
                                            </tr>
                                            <tr>
                                                <td>Done</td>
                                                <td><form action="{{action('ToDoListController@update', ['id'=>$task->id])}}" method="post" class="form-inline">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                    <input type="hidden" name="redirectToId" value="1">
                                                    <input type="checkbox" name="task_done" {{$task->task_done?'checked':''}} onclick="submit();">
                                                    </form></td>
                                            </tr>
                                            <tr>
                                                <td>Created by</td>
                                                <td>{{$task->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Id</td>
                                                <td>{{$task->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Created at</td>
                                                <td>{{$task->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>Updated at</td>
                                                <td>{{$task->updated_at}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    <a href="/todolist" class="btn btn-info">Back</a>
                                    <a href="/todolist/{{$task->id}}/edit" class="btn btn-primary pull-right">Edit</a>

                                
                            </div>
                        </div>
                    </div>
            
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
