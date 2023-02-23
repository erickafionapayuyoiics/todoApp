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
                                </div>
                                <div id = "invalid-title" style = "color:red; margin-left:35%" class="col-md-6"></div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end"></label>
                                <div id = "contentdiv" class="col-md-6">
                                </div>
                                <span id = "invalid-content" style = "color:red; margin-left:35%" class="col-md-6"></span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-outline-primary" type="submit" id="update" onclick = "update_post()">Update</button>
                                    <button class="btn btn-outline-danger" type="submit" id="delete" onclick = "delete_post()">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            $(function(){
                get_post()
            })
            function get_post(){
                axios.get('/api/showpost/{{$post->id}}')
                .then(function (response){
                    var headerdiv = document.getElementById("titlediv");
                    console.log(response.data);
                    data = response.data;
                    headerdiv.innerHTML += `<input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="${data.title}" required autocomplete="title" autofocus>` ;
                    var bodydiv = document.getElementById("contentdiv");
                    console.log(response.data);
                    data = response.data;
                    bodydiv.innerHTML += `<textarea class="form-control" id="content" name="content" rows="3" required>${data.content}</textarea>` ;

                })
                .catch(function (error){
                    //handle error
                    console.log(error);
                });
            }

            function update_post(){
                var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.put('/api/update/{{$post->id}}', {
                    title: document.getElementById('title').value,
                    content: document.getElementById('content').value,
                })
                .then(function (response) {
                    alert('Updated successfully.');
                    location.href = '/post'
                })
                .catch(function (error) {
                    var errortitle = document.getElementById('invalid-title')
                    var errorcontent = document.getElementById('invalid-content')
                    errortitle.innerHTML = "";
                    errorcontent.innerHTML = "";
                    errors = Object.values(error.response.data.errors);
                    console.log(errors)
                    if(document.getElementById('title').value == "" && document.getElementById('content').value == ""){
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
            }

            function delete_post(){
                axios.delete('/api/delete/{{$post->id}}')
                .then(function (response){
                    alert('Deleted');
                    location.href = '/post';
                })
                .catch(function (error){
                    //handle error
                    console.log(error);
                });
            }
        </script>
@endsection
