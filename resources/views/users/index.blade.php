@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

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
                                    <th>Id</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="/users/{{$user->id}}" class="">{{$user->name}}</a></td>
                                </tr>
                            @endforeach
                        </table>
                        
                        <a href="/home" class="btn btn-info">Back</a>
                        <a href="/users/create" class="btn btn-primary pull-right">New</a>
                    </div>
                </div>
            </div>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
