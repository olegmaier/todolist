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
                                 <form action="{{action('ToDoListController@destroy', ['id'=>$task->id])}}" method="post" style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger pull-right" value="Delete" onclick="return confirm('Are you sure you want to delete task {{$task->id}}?')">
                                    
                                </form>
                                <h4>{{$task->title}}</h4>
                                    <div class="table-responsive"> 
                                        <table class="table">
                                            <tr>
                                                <td>Description</td>
                                                <td>{{$task->description}}</td>
                                            </tr>
                                            <tr>
                                                <td>Created at</td>
                                                <td>{{$task->created_at}}</td>
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
