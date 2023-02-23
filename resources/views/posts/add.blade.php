@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id = "mycontent" class="col-md-10">
                <div class="card">
                    <div id = "header" class="card-header">Post</div>
                    <div class="card-body">
                        <form id = "post_form">
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Post Title</label>

                                <div id = "titlediv" class="col-md-6">
                                    <input id="title" type="title" class="form-control" name="title" required autocomplete="title" autofocus>
                                        <span id = "invalid-title" style = "color:red;">
                                        </span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end"></label>
                                <div id = "contentdiv" class="col-md-6">
                                    <textarea class="form-control @error('title') is-invalid @enderror" id="content" name="content" rows="3" placeholder="Write post..." required></textarea>
                                    <span id = "invalid-content" style = "color:red;">
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                <button class="btn btn-outline-primary" type="submit" id="update" onclick = "add_post()">Add post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul id = "error-list" class = "list-group"></ul>
            </div>
        </div>
    </div>
        <script>
  
            
            function add_post(){
                var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.post('/api/add', {
                    title: document.getElementById('title').value,
                    content: document.getElementById('content').value,
                })
                .then(function (response) {
                    
                    alert('Added successfully.');
                    location.href = '/post'
                })
                .catch(function (error) {
                    var errortitle = document.getElementById('invalid-title')
                    var errorcontent = document.getElementById('invalid-content')
                    errortitle.innerHTML = ""
                    errorcontent.innerHTML = ""
                    errors = Object.values(error.response.data.errors);
                    if(document.getElementById('title').value == "" && document.getElementById('content').value ==""){
                        errortitle.innerHTML = errors[0]
                        errorcontent.innerHTML = errors[1]
                    }
                    else if(document.getElementById('title').value ==""){
                        errortitle.innerHTML = errors[0]
                    }   
                    else if(document.getElementById('content').value ==""){
                        errorcontent.innerHTML = errors[0]
                    }                    
                    

                });
                ;
            };
        </script>
@endsection
