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
                                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end"></label>
                                <div id = "contentdiv" class="col-md-6">
                                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Write post..."></textarea>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                <button class="btn btn-outline-primary" type="submit" id="update" onclick = "add_post()">Add post</button>
                                </div>
                            </div>
                    </div>
                </div>
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
                    console.log(error);
                });
                ;
            };
        </script>
@endsection
