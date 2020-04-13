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
                                    <th>Complete</th>
                                </tr>
                            </thead>
                            @if (!empty($todolist))
                                @foreach ($todolist as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td><a href="/todolist/{{$task->id}}">{{str_limit($task->title, $limit = 50, $end = '...')}}</a></td>
                                    <td><input type="checkbox" class="checkbox-primary"></td>
                                    </tr>
                                    
                                @endforeach
                            @endif
                        </table>
                        
                        <a href="/" class="btn btn-info">Back</a>
                        <a href="/todolist/create" class="btn btn-primary pull-right">New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
