@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ToDo List</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Done</th>
                                </tr>
                            </thead>
                            @if (!empty($tasks))
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td><a href="/tasks/{{$task->id}}">{{str_limit($task->title, $limit = 50, $end = '...')}}</a></td>
                                        <td><form action="{{action('TasksController@update', ['id'=>$task->id])}}" method="post" class="form-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                        <input type="checkbox" name="task_done" {{$task->task_done?'checked':''}} onclick="submit();">
                                        </form></td>
                                    </tr>
                                    
                                @endforeach
                            @endif
                        </table>
                        
                        <a href="/" class="btn btn-info">Back</a>
                        <a href="/tasks/create" class="btn btn-primary pull-right">New</a>
                    </div>
                </div>
            </div>
            {{$tasks->links()}}
        </div>
    </div>
</div>
@endsection
