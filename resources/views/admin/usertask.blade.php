@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <br>
            <h1>User Tasks</h1>
            <br>
            @if (isset($tasks))
            <table class = "table table-striped table-dark" style = "width:100%">
                <tr>
                    <th style = "width:20%">User ID</th>
                    <th style = "width:20%">User Name</th>
                    <th style = "width:80%">Task</th>
                </tr>
                
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$task->title}}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
