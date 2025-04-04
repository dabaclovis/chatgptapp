@extends('layouts.user')

@section('title','dashboard blog posts create | application')

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Card for the form -->
                <div class="card shadow">
                    <div class="card-header w3-teal w3-center w3-padding-16">
                        <h3 class="text-white mb-0">Create a Post</h3>
                    </div>
                    <div class="card-body w3-padding-16">
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <!-- Title Field -->
                            <div class="form-group mb-3">
                                <input id="title" type="text" name="title" @class(["form-control",'border-danger' => $errors->has('title')]) placeholder="Enter post title">
                            </div>

                            <!-- Body Field -->
                            <div class="form-group mb-3">
                                <textarea id="body" name="body" @class(["form-control",'border-danger' => $errors->has('body')]) rows="10" placeholder="Write your post content here"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <select name="category" @class(["form-control form-group-sm",'border-danger' => $errors->has('category')]) id="category">
                                    <option selected disabled>choose blog category</option>
                                    <option value="technology">Technology</option>
                                    <option value="education">Education</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="politics">Politics</option>
                                    <option value="history">History</option>
                                    <option value="business">Business</option>
                                    <option value="america">America</option>
                                    <option value="religion">Religion</option>
                                    <option value="africa">Africa</option>
                                    <option value="news">News</option>
                                    <option value="asia">Asia</option>
                                    <option value="healthcare">Healthcare</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="file" name="avatar" id="">
                            </div>

                            <!-- Submit Button pushed to the right -->
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary w3-button w3-teal w3-round-large">Publish Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
