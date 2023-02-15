@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
            <form method="post" action="{{route('data.update', [$task->id])}}">
            @csrf
            @method('put')
                <div class="input-group mb-3">
                    <input id = "title" name = "title" type="text" class="form-control" value="{{$task->title}}">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Update Task</button>
                </div>
            </form>
        <br>
       
        </div>
    </div>
</div>
@endsection
