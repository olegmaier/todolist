@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">UPDATE TASK {{$task->title}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{action('ToDoListController@update', ['id'=>$task->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $task->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control" name="description" value="">{{ $task->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="/todolist/{{$task->id}}" class="btn btn-info">Back</a>
                                <input type="hidden" name="redirectToId" value="1">
                                <input type="hidden" name="task_done" value="{{$task->task_done?'on':''}}">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>
</div>
@endsection
