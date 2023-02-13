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
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Task Title" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Add Task</button>
            </div>
            
                
        </div>
    </div>
</div>
@endsection
