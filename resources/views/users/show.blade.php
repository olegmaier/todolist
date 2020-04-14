@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER INFO</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-md-12">  
                                    <form action="{{action('UsersController@destroy', ['id'=>$user->id])}}" method="post"  class="form-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger pull-right" value="Delete" onclick="return confirm('Are you sure you want to delete user {{$user->id}}?')">
                                        
                                    </form>
                                <h4>{{$user->name}}</h4>
                              

                                    <div class="table-responsive"> 
                                        <table class="table">
                                            <tr>
                                                <td>User ID</td>
                                                <td>{{$user->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>User Email</td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Created at</td>
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>Updated at</td>
                                                <td>{{$user->updated_at}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    <a href="/users/" class="btn btn-info">Back</a>
                                    <a href="/users/{{$user->id}}/edit" class="btn btn-primary pull-right">Edit</a>
                                
                            </div>
                        </div>
                    </div>
            
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
