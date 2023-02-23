@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Post Feed</h1>
                <a href = "{{route('post.add')}}">            
                    <button class="btn btn-outline-dark float-end" type="submit" id="button-addon2">Add Post</button>    
                </a>
                <br><br><br>
                <div id = "mycontent">      
                    <div id = "list-group" class="list-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            $(function(){
                get_posts()
            })
            function get_posts(){
                axios.get('/api/showposts')
                .then(function (response){
                    var contentdiv = document.getElementById("list-group");
                    console.log(response.data);
                    data = response.data;
                    data.forEach((i) => {
                        contentdiv.innerHTML += `<a href="/post/${i.id}" class= "list-group-item list-group-item-action list-group-item-secondary" style = "padding:20px;"> ${i.title} </a>` ;
                    });
                })
                .catch(function (error){
                    //handle error
                    console.log(error);
                });
            }

        </script>
@endsection
