@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id = "mycontent" class="col-md-10">
                <div class="card">
                    <div id = "header" class="card-header">Post</div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Post Title</label>

                                <div id = "titlediv" class="col-md-6">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end"></label>
                                <div id = "contentdiv" class="col-md-6">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-outline-primary" type="submit" id="update" onclick = "update_post()">Update</button>
                                    <button class="btn btn-outline-danger" type="submit" id="delete" onclick = "delete_post()">Delete</button>
                                </div>
                            </div>
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
                    bodydiv.innerHTML += `<textarea class="form-control" id="content" name="content" rows="3">${data.content}</textarea>` ;
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
                    console.log(error);
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
