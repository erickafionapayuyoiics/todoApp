@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
        <br>
        <h1>Task Summary</h1>
        <table class = "table table-striped table-dark" style = "width:100%">
            <tr>
                <th style = "width:20%">User ID</th>
                <th style = "width:80%">Task</th>

            </tr>
            @if (isset($tasks))
            @foreach($tasks as $task)
          <tr>
                <td>
                {{$task->user_id}}
                </td>
                <td>
                {{$task->title}}
                </td>
        
        </tr>
            @endforeach
            @endif
            
        </table>
        </div>
    </div>
</div>
@endsection
