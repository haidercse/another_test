@extends('backend.layouts.master')

@section('title')
    Dashboard-page
@endsection

@section('admin-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class=" card-body">
                        <a class="float-right btn btn-success" href="" data-toggle="modal"
                            data-target="#exampleModal">Add More</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('post.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    aria-describedby="emailHelp">

                                            </div>
                                            <div class="form-group">
                                                <label for="name">Details</label>
                                                <textarea name="details" class="form-control" id="details" cols="30" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        @foreach ($posts as $post)
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h2>{{ $post->name }} </h2>
                                        <p>{{ $post->details }}</p>
                                        <p style="margin-top: 10px"> created by <b>{{ $post->user->name }} </b>
                                            <span style="margin-left:5px "> {{ $post->created_at->diffForHumans() }}</span>
                                        </p>
                                        <a href="{{ route('post.details', $post->id) }}" class=" btn btn-light float-right "> Show Details</a>
                                    </div>
                                    <hr>
                                </div>
                               
                            </div>
                        @endforeach
                    </div>
                    {{ $posts->links() }}


                    <div class="card mt-4">
                        <div class="card-body">
                            <h1>JJJJ</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
