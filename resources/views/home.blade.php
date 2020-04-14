@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-md-6">
                        <h3>Last Tasks</h3>
                        <ul class="list-group">
                            @foreach ($data['tasks'] as $task)
                                <li class="list-group-item"><a href="/tasks/{{$task->id}}">{{$task->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Last Users</h3>
                        <ul class="list-group">
                            @foreach ($data['users'] as $user)
                                <li class="list-group-item"><a href="/users/{{$user->id}}">{{$user->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
