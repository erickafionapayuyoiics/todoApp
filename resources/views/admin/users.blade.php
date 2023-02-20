@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <br>
        <br>
        <h1>User Management</h1>
        <a href = "{{route('admin.add')}}">            
            <button class="btn btn-outline-dark float-end" type="submit" id="button-addon2">Add User</button>    
        </a>
        <br><br>
        <table class = "table table-dark table-striped" style = "width:100%">
            <tr>
                <th style = "width:40%">Name</th>
                <th style = "width:40%">Email</th>
                <th style = "width:20%" colspan = "3">Actions</th>
            </tr>
            @if (isset($users))
            @foreach($users as $user)
          <tr>
            <td style = "width:40%">
                <img class="img-fluid rounded-circle me-1" width="35" src = "{{$user->getFirstMediaUrl('profile_image') ? $user->getFirstMediaUrl('profile_image') : asset('/images/default.png')}}"/>
                {{$user->name}}
                </td>
                <td style = "width:40%">
                {{$user->email}}
                </td>
                
                <td style = "width:12%">
                    <a href = "{{route('admin.showtasks', [$user->id])}}">
                        @csrf 
                        <button class="btn btn-outline-light" type="submit">
                            View Tasks
                        </button>   
                    </a>
                </td>
            <td style = "width:6%">
                    <a href = "{{route('admin.showuser', [$user->id])}}">
                        @csrf 
                        @method('put')
                        <button class="btn btn-outline-light" type="submit">
                            Edit
                        </button>   
                    </a>
                </td>
                <td style = "width:12%">  
                    <form method="post" action="{{route('admin.delete', [$user->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-light" type="submit" id="delete">Delete</button>
                    </form>
        </tr>
            @endforeach
            @endif
        </table>
        </div>
    </div>
</div>
@endsection
