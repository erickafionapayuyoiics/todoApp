@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <form method="post" action="{{route('data.insert', Auth::user()->id)}}">
            @csrf
                <div class="input-group mb-3">
                    <input id = "title" name = "title" type="text" class="form-control" placeholder="Task Title" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add Task</button>
                </div>
            </form>
        <br>
        <h1>Tasks</h1>
        <table class = "table table-hover" style = "width:100%">
            @if (isset($tasks))
            @foreach($tasks as $task)
          <tr>
                <td style = "width:80%">
                <input class="form-check-input me-1" type="checkbox" aria-describedby="button-addon2">
                {{$task->title}}
                </td>
                
                <td style = "width:10%">
                    <a href = "{{route('data.show', [$task->id])}}">
                        @csrf 
                        @method('put')
                        <button class="btn btn-outline-primary" type="submit">
                            Edit
                        </button>   
                    </a>
                </td>
                <td style = "width:10%">  
                    <form method="post" action="{{route('data.delete', [$task->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-primary" type="submit" id="delete">Delete</button>
                    </form>
                </td>
            @endforeach
            @endif
            
        </tr>
        </table>
        </div>
    </div>
</div>
@endsection
