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
                            <div class="col-sm-6 col-md-4">
                                <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4>
                                    {{$user->name}}</h4>
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
                                    </table>
                                    <a href="/user/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                                <form action="{{action('UsersController@destroy', ['id'=>$user->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger pull-right" value="Delete">
                                    {{ method_field('DELETE') }}
                                </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
